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
        $category = $this->getById($id);

        array_push($this->categories, $category);

        if ($category != null) {
            if ($category->getParent_id() != 0 && $category->getParent_id() != null) {
                $this->getWithParents($category->getParent_id());
            }
        }

        return $this->categories;
    }
    public function getChildCategories($params)
    {
        $this->join('products', $this->table . '.id=products.category_id', 'LEFT OUTER JOIN')
            ->where("$this->table.parent_id", $params['parent_id'])
            ->select("$this->table.*,count(products.id) as product_count")
            ->groupBy("$this->table.id");

        return parent::getAll();
    }
}
