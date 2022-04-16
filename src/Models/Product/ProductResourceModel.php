<?php

namespace SRC\Models\Product;

use SRC\Core\ResourceModel;

class ProductResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->_init("products", "id", new ProductModel());
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
        $this->join('categories', 'products.category_id=categories.id', 'categories.name as category_name');

        return parent::getAll();
    }
}
