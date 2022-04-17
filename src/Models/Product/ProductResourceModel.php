<?php

namespace SRC\Models\Product;

use SRC\Core\ResourceModel;
use SRC\Models\Image\ImageResourceModel;


class ProductResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->_init("products", "id", new ProductModel());
        $this->imageResoureModel = new ImageResourceModel();
    }
    public function getAll($params = [])
    {

        $paginateSqlDefault = [
            'p' => 1,
            'pageNum' => 20
        ];

        $params =  array_merge($paginateSqlDefault, $params);

        foreach ($params as $key => $value) {
            $value = urldecode($value);
            $key = urldecode($key);

            switch ($key) {
                case 'p':
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
        $this->join('categories', "$this->table.category_id=categories.id")
            ->join('brands', "$this->table.brand_id=brands.id")
            ->select("$this->table.*,categories.name as category_name,brands.name as brands_name");


        $products = parent::getAll();
        foreach ($products as $key => $p) {
            $products[$key]->images = $this->includeImage($p->getId());
        }
        return $products;
    }
    public function getById($id)
    {
        $product = parent::getById($id);
        $product->images = $this->includeImage($product->getId());
        return $product;
    }

    private function includeImage($pid)
    {
        $images = $this->imageResoureModel
            ->where('product_id', $pid)
            ->getAll();

        $paths = [];
        if (count($images) <= 0) {
            $paths = ["default-product-image.png", "default-product-image.png"];
        } else if (count($images) <= 1) {
            $paths = [$images[0]->getPath(), $images[0]->getPath()];;
        } else {
            foreach ($images as $i) {
                array_push($paths, $i->getPath());
            }
        }

        return $paths;
    }
}
