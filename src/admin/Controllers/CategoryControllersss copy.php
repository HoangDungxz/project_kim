<?php

namespace ADMIN\Controllers;

use SRC\Models\Category\CategoryModel;
use SRC\Models\Category\CategoryResourceModel;


class CategoryController extends AdminControllers
{
    private $categoriesResourceModel;
    private $categoriesShow = '';
    private $categoriesOptionShow = '';

    /**
     * CategoryController
     * 
     * @param ControllerName Danh sách danh mục
     */
    function index()
    {
        $this->categoriesResourceModel = new CategoryResourceModel();

        $categories = $this->categoriesResourceModel->getAll();

        $this->showCategories($categories);

        $categoriesShow = $this->categoriesShow;

        $this->with($categoriesShow);

        $this->render("index");
    }

    // BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
    private function showCategories($categories, $parent_id = 0, $char = '')
    {
        // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
        foreach ($categories as $key => $c) {
            // Nếu là chuyên mục con thì hiển thị
            if ($c->getParent_id() == $parent_id) {
                $this->categoriesShow .= '<tr>';

                $displayHomePage =
                    $c->getDisplayhomepage() == 0 ?
                    '<label class="badge badge-danger">Không</label>'
                    :
                    '<label class="badge badge-success">Có</label>';
                // Hiển thị tiêu đề chuyên mục
                $this->categoriesShow .= '<td>' . $c->getId() . '</td>
                                            <td>    ' . $char . $c->getName() . ' </td>
                                            <td>' . $displayHomePage . ' </td>
                                            <td class="text-right">
                                                <a href="edit_category.html" class="btn btn-sm bg-success-light mr-2">
                                                    <i class="far fa-edit mr-1"></i> Sửa
                                                </a>
                                                <a data-id="40" href="javascript:void(0);" 
                                                class="btn btn-sm bg-danger-light mr-2 delete_review_comment" 
                                                data-toggle="modal" data-target="#model-1">
                                                    <i class="far fa-trash-alt mr-1"></i> Xoá
                                                </a>
                                            </td>';

                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                $this->showCategories($categories, $c->getId(), $char . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
                $this->categoriesShow .= '</tr>';
                unset($categories[$key]);
            }
        }
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

        $this->showOptionCategories($categories);
        $categoriesOptionShow = $this->categoriesOptionShow;

        $this->with($categories);
        $this->with($categoriesOptionShow);

        if (isset($_POST['category_name']) && isset($_POST['category_parent'])) {

            $category = new CategoryModel();
            $category->setName($_POST['category_name']);
            $category->setParent_id($_POST['category_parent']);
            $category->setDisplayhomepage($_POST['displayhomepage'] == 0 ? 0 : 1);

            if ($this->categoriesResourceModel->save($category)) {
                header('Location: ' . WEBROOT . "admin/category");
            }
        } else {
            $message = "Bạn chưa nhập tên hoặc chọn danh mục cha";
        }

        $this->render("create");
    }

    // BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
    private function showOptionCategories($categories, $parent_id = 0, $char = '')
    {

        // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
        foreach ($categories as $key => $c) {
            // Nếu là chuyên mục con thì hiển thị
            if ($c->getParent_id() == $parent_id) {
                $this->categoriesOptionShow .= '<option value="' . $c->getId() . '">' . $char . $c->getName() . '</option>';

                unset($categories[$key]);

                $this->showOptionCategories($categories, $c->getId(), $char . '|---');
            }
        }
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
