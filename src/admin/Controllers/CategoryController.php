<?php

namespace ADMIN\Controllers;

use SRC\Models\Category\CategoryModel;
use SRC\Models\Category\CategoryResourceModel;
use SRC\Models\Product\ProductResourceModel;

/**
 * CategoryController
 * 
 * @param ControllerName Quản lý danh mục
 * @param SortOrder 2
 * @param Icon  fas fa-certificate
 */
class CategoryController extends AdminControllers
{
    private $categoriesResourceModel;
    private $productsResourceModel;



    private $categoriesShow = '';
    private $categoriesOptionShow = '';

    private $categoryId;
    private $categoryParentId;

    function __construct()
    {
        parent::__construct();
        $this->categoriesResourceModel = new CategoryResourceModel();
        $this->productsResourceModel = new ProductResourceModel();
    }


    /**
     * CategoryController
     * 
     * @param AcctionName Danh sách danh mục
     */
    function index($params)
    {

        if (isset($params['cid'])) {
            $cid = $params['cid'];
        } else {
            $cid = $this->categoriesResourceModel->select('MIN(categories.id) as categories_min_id')
                ->get()->categories_min_id;
        }

        $this->categoriesResourceModel = new CategoryResourceModel();
        $category = $this->categoriesResourceModel
            ->where('categories.id', $cid)->get();

        $this->categoryId = $category->getId();
        $this->categoryParentId = $category->getparent_id();

        $this->with($category);

        $products = $this->productsResourceModel->where('category_id', $this->categoryId)->getAll();
        $this->with($products);

        $categories = $this->categoriesResourceModel
            ->join('products', 'products.category_id=categories.id', "LEFT OUTER JOIN")
            ->select('categories.*,count(products.id) as product_count')
            ->groupBy('categories.id')
            ->getAll();

        $this->showCategories($categories);

        $categoriesShow = $this->categoriesShow;

        $this->showOptionCategories($categories);
        $categoriesOptionShow = $this->categoriesOptionShow;


        $this->with($categoriesOptionShow);

        $this->with($categoriesShow);

        $this->render("index");
    }

    // BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
    private function showCategories($categories, $parent_id = 0, $char = '')
    {
        foreach ($categories as $key => $c) {
            // Nếu là chuyên mục con thì hiển thị
            if ($c->getParent_id() == $parent_id) {

                $active = $this->categoryId == $c->getId() ? 'active' : '';

                $displayHomePage = $c->getDisplayhomepage() == 0 ?
                    'danger' : 'success';

                $this->categoriesShow .=
                    '<a class="nav-link mb-0 ' .  $active . '" href="' . WEBROOT . 'admin/category/index/cid/' . $c->getId() . '">'
                    . $char . $c->getName()
                    . ' <div class="badge badge-' . $displayHomePage . ' badge-pill"> ' . $c->product_count . '</div>
                    </a>';

                unset($categories[$key]);

                $this->showCategories($categories, $c->getId(), $char . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
            }
        }
    }

    // BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
    private function showOptionCategories($categories, $parent_id = 0, $char = '')
    {
        // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
        foreach ($categories as $key => $c) {
            // Nếu là chuyên mục con thì hiển thị

            $selected = $this->categoryParentId == $c->getId() ? 'selected' : '';

            if ($c->getParent_id() == $parent_id) {
                $this->categoriesOptionShow .= '<option ' . $selected . ' value="' . $c->getId() . '">' . $char . $c->getName() . '</option>';

                unset($categories[$key]);

                $this->showOptionCategories($categories, $c->getId(), $char . '|---');
            }
        }
    }

    /**
     * CategoryController
     * 
     * @param AcctionName Tạo mới danh mục
     */
    function create()
    {
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
     * @param AcctionName Sửa danh mục
     */
    function update()
    {

        extract($_POST);
        if (isset($cid) && isset($category_parent) && isset($category_name)) {
            $category = $this->categoriesResourceModel->getById($cid);

            if ($category) {

                $category->setParent_id($category_parent);

                $category->setDisplayhomepage(isset($displayhomepage) ? 1 : 0);
                $category->setName($category_name);

                if ($this->categoriesResourceModel->save($category)) {

                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
