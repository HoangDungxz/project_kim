<?php

namespace SRC\Models\Product;

use SRC\Core\ResourceModel;
use SRC\Models\Image\ImageResourceModel;


class ProductResourceModel extends ResourceModel
{
    protected $imageResoureModel;
    public function __construct()
    {
        parent::__construct();
        $this->imageResoureModel = new ImageResourceModel();
    }
    public function getAll($params = [])
    {

        foreach ($params as $key => $value) {
            $value = urldecode($value);
            $key = urldecode($key);

            switch ($key) {
                case 'p':
                    $params['pageNum'] = $params['pageNum'] ?? 8;
                    $this->paginate($params['p'], $params['pageNum']);
                    break;
                case 'price':
                    $this->between('price', $value);
                    break;
                case 'key':
                    $this->like("$this->table.name", $value);
                    break;
                case 'cid':
                    $this->where("$this->table.category_id", $value);
                    break;
                case 'brand':
                    $this->where("$this->table.brand_id", $value);
                    break;
                case 'sort':
                    switch ($value) {
                        case 'priceasc':
                            $this->order("$this->table.price", 'asc');
                            break;
                        case 'pricedesc':
                            $this->order("$this->table.price", 'desc');
                            break;
                        case 'alphaasc':
                            $this->order("$this->table.name", 'asc');
                            break;
                        case 'alphadesc':
                            $this->order("$this->table.name", 'desc');
                            break;
                        case 'discountasc':
                            $this->order("$this->table.discount", 'asc');
                            break;
                        case 'discountdesc':
                            $this->order("$this->table.discount", 'desc');
                            break;
                        case 'iddesc':
                            $this->order("$this->table.id", 'desc');
                            break;
                        default:
                            $this->order("$this->table.id", 'asc');
                            break;
                    }
                    break;
                default:
                    break;
            }
        }

        $this->join('categories', "$this->table.category_id=categories.id", 'LEFT OUTER JOIN')
            ->join('brands', "$this->table.brand_id=brands.id", 'LEFT OUTER JOIN')
            ->select("$this->table.*,categories.name as category_name,brands.name as brands_name");


        $products = parent::getAll();
        foreach ($products as $key => $p) {
            $products[$key]->images = $this->includeImage($p->getId());
        }
        return $products;
    }
    public function get($params = [])
    {
        $this->join('categories', "$this->table.category_id=categories.id")
            ->where("$this->table.$this->id", $params['pid'])
            ->join('brands', "$this->table.brand_id=brands.id")
            ->select("$this->table.*,categories.name as category_name,brands.name as brands_name");

        $product = parent::get();
        if ($product == false) {
            return $product;
        }
        $product->images = $this->includeImage($product->getId());

        return $product;
    }

    public function countProducts()
    {

        $this->select('COUNT(id) as count_product');

        $countProducts = parent::get();

        return $countProducts != null ? $countProducts->count_product : 0;
    }

    public function getAllInclule(...$columns)
    {
        $include = implode(",$this->table.", $columns);
        $include = rtrim($include, ',');

        $this->select($include);
        return parent::getAll();
    }
}
