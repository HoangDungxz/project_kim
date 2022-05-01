<?php

namespace SRC\Models\Category;

use SRC\Core\ResourceModel;

class CategoryResourceModel extends ResourceModel
{
    private $categories;
    private $childCategories = [];
    public function __construct()
    {
        parent::__construct();
        $this->categories = [];
    }


    public function getWithParents($id)
    {
        $category = $this->getById($id);

        array_push($this->categories, $category);

        if ($category != null && $category->getParent_id() != $category->getId()) {
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
            ->where('displayhomepage', 1)
            ->select("$this->table.*,count(products.id) as product_count")
            ->groupBy("$this->table.id");

        return parent::getAll();
    }

    public function categoriesAllChild($id)
    {
        $categories = $this->getAll();


        $this->getAllChildCategory($categories, $id);

        return $this->childCategories;
    }

    // BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
    private function getAllChildCategory($categories, $parent_id = 0)
    {
        foreach ($categories as $key => $c) {
            // Nếu là chuyên mục con thì lấy
            if ($c->getParent_id() == $parent_id) {

                array_push($this->childCategories, $c);

                unset($categories[$key]);

                $this->getAllChildCategory($categories, $c->getId());
            }
        }
    }
}
