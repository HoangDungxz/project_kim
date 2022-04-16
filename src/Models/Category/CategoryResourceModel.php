<?php

namespace SRC\Models\Category;

use SRC\Core\ResourceModel;

class CategoryResourceModel extends ResourceModel
{
    private $categories;
    public function __construct()
    {
        $this->categories = [];
        $this->_init("categories", "id", new CategoryModel());
    }

    public function getWithParents($id)
    {
        $category = $this->get($id);

        array_push($this->categories, $category);

        if ($category != null) {
            if ($category->getParent_id() != 0 && $category->getParent_id() != null) {
                $this->getWithParents($category->getParent_id());
            }
        }

        return $this->categories;
    }
    public function getCategoriesWithParents($params)
    {

        foreach ($params as $key => $value) {

            $value = urldecode($value);
            $key = urldecode($key);

            switch ($key) {
                case 'parent_id':
                    $this->where("$this->table.parent_id", $value);
                    break;
                case 'get_product_count':
                    $this->join('products', $this->table . '.id=products.category_id', "count(products.id) as product_count");
                    unset($params['get_product_count']);
                    break;
                default:
                    break;
            }
        }

        return parent::getAll();
    }
}
