<?php

namespace ADMIN\Controllers;

use SRC\Core\Controller;
use SRC\Models\Category\CategoryModel;
use SRC\Models\Category\CategoryResourceModel;

class CategoryController extends AdminControllers
{
    private $categoriesResourceModel;
    function index()
    {
        $this->categoriesResourceModel = new CategoryResourceModel();

        $categories = $this->categoriesResourceModel->getAll();

        $this->with($categories);

        $this->render("index");
    }

    function prepare_save()
    {
        $this->categoriesResourceModel = new CategoryResourceModel();

        $categories = $this->categoriesResourceModel->getAll();

        // echo '<pre>';
        // print_r($categories);
        // echo '</pre>';
        // die;

        $this->with($categories);

        $this->render("prepare_save");
    }

    function save()
    {
        $this->categoriesResourceModel = new CategoryResourceModel();

        if (isset($_POST['category_name']) && isset($_POST['category_parent'])) {
            $category = new CategoryModel();
            $category->setName($_POST['category_name']);
            $category->setParent_id($_POST['category_parent']);

            if ($this->categoriesResourceModel->save($category)) {
            }
        } else {
            $message = "Bạn chưa nhập tên hoặc chọn danh mục cha";
        }


        $this->render("prepare_save");
    }
}
