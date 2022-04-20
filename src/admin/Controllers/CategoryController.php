<?php

namespace ADMIN\Controllers;

use SRC\Models\Category\CategoryModel;
use SRC\Models\Category\CategoryResourceModel;

/**
 * CategoryController
 * 
 * @param ControllerName Quản lý danh mục
 * @param SortOrder 2
 */
class CategoryController extends AdminControllers
{
    private $categoriesResourceModel;

    /**
     * CategoryController
     * 
     * @param ControllerName Danh sách danh mục
     */
    function index()
    {
        $this->categoriesResourceModel = new CategoryResourceModel();

        $categories = $this->categoriesResourceModel->getAll();

        $this->with($categories);

        $this->render("index");
    }

    /**
     * CategoryController
     * 
     * @param ControllerName Tạo mới danh mục
     */
    function create()
    {
        $this->categoriesResourceModel = new CategoryResourceModel();

        $categories = $this->categoriesResourceModel->getAll();

        $this->with($categories);

        if (isset($_POST['category_name']) && isset($_POST['category_parent'])) {

            $category = new CategoryModel();
            $category->setName($_POST['category_name']);
            $category->setParent_id($_POST['category_parent']);
            $category->setDisplayhomepage($_POST['displayhomepage'] == 0 ? 0 : 1);

            if ($this->categoriesResourceModel->save($category)) {
                header('Location: ' . WEBROOT . "admin/category");
                // $message = "Bạn chưa nhập tên hoặc chọn danh mục cha";
                // $this->render("index");
            }
        } else {
            $message = "Bạn chưa nhập tên hoặc chọn danh mục cha";
        }

        $this->render("create");
    }

    /**
     * CategoryController
     * 
     * @param ControllerName Sửa danh mục
     */
    function edit()
    {
        $this->categoriesResourceModel = new CategoryResourceModel();

        $categories = $this->categoriesResourceModel->getAll();

        $this->with($categories);

        $this->render("prepare_save");
    }
}
