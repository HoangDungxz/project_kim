<?php

namespace ADMIN\Controllers;

use SRC\helper\MSG;
use SRC\Models\Category\CategoryModel;
use SRC\Models\Category\CategoryResourceModel;
use SRC\Models\Image\ImageResourceModel;
use SRC\Models\Product\ProductResourceModel;

/**
 * CategoryController
 * 
 * @param ControllerName Quản lý danh mục
 * @param SortOrder 2
 * @param Icon fas fa-book
 */
class CategoryController extends AdminControllers
{
    private $categoriesResourceModel;
    private $productsResourceModel;
    private $imagesResourceModel;

    private $categoriesShow = '';
    private $categoriesOptionShow = '';

    private $categoryId;
    private $categoryParentId;

    private $will_deletes = [];

    function __construct()
    {
        parent::__construct();
        $this->categoriesResourceModel = new CategoryResourceModel();
        $this->productsResourceModel = new ProductResourceModel();

        $this->imagesResourceModel = new ImageResourceModel();
    }


    /**
     * CategoryController
     * 
     * @param AcctionName Danh sách danh mục
     */
    function index($params)
    {

        // lấy id category hoặc id nhỏ nhất bảng category

        if (isset($params['cid'])) {
            $cid = $params['cid'];
        } else {
            $cid = $this->categoriesResourceModel->select('MIN(categories.id) as categories_min_id')
                ->get()->categories_min_id;
        }

        $category = $this->categoriesResourceModel
            ->where('categories.id', $cid)->get();

        if (!$category) {

            $this->render("empty_category");
            die;
        }

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

        $this->showOptionCategories($categories, 0, '', $category->getId());

        $categoriesOptionShow = $this->categoriesOptionShow;

        $this->with($categoriesOptionShow);

        $this->with($categoriesShow);

        $this->render("index");
    }

    // HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
    private function showCategories($categories, $parent_id = 0, $char = '')
    {
        foreach ($categories as $key => $c) {
            // Nếu là chuyên mục con thì hiển thị
            if ($c->getParent_id() == $parent_id) {

                $active = $this->categoryId == $c->getId() ? 'active' : '';

                $displayHomePage = $c->getDisplayhomepage() == 0 ?
                    'danger' : 'success';

                $this->categoriesShow .=
                    '<div class="category-item">
                    <a class="nav-link mb-0 ' .  $active . '" href="' . WEBROOT . 'admin/category/index/cid/' . $c->getId() . '">
                    <div class="badge badge-' . $displayHomePage . ' badge-pill"> ' . $c->product_count . '</div>'
                    . '<span>' . $char . $c->getName() .
                    '</span>
                    </a>
                        <i class="far fa-trash-alt delete-category" cid="' . $c->getId() . '" cname="' . $c->getName() . '" ></i>
                    </div>';

                unset($categories[$key]);

                $this->showCategories($categories, $c->getId(), $char . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
            }
        }
    }

    // BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ OPTION CATEGORIES
    private function showOptionCategories($categories, $parent_id = 0, $char = '', $current_id = '')
    {
        // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
        foreach ($categories as $key => $c) {
            // Nếu là chuyên mục con thì hiển thị
            $disabled = $c->getId() == $current_id ?
                'disabled' : '';

            $selected = $this->categoryParentId == $c->getId() ? 'selected' : '';

            if ($c->getParent_id() == $parent_id) {
                $this->categoriesOptionShow .= '<option ' . $selected . ' ' . $disabled . '  value="' . $c->getId() . '">' . $char . $c->getName() . '</option>';

                unset($categories[$key]);

                $this->showOptionCategories($categories, $c->getId(), $char . '|---', $current_id);
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
                MSG::send('Thêm danh mục thành công', 'success');
                header('Location: ' . WEBROOT . "admin/category");
            }
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

        if (isset($cid) && isset($category_parent) && isset($category_name) && $cid !== $category_parent) {

            $category = $this->categoriesResourceModel->getById($cid);

            if ($category) {

                $category->setDisplayhomepage(isset($displayhomepage) ? 1 : 0);
                $category->setName($category_name);

                // lấy danh sách tất cả các categry con cháu ...
                $categoriesChilds = $this->categoriesResourceModel->categoriesAllChild($cid);

                // lấy danh sách tất cả các categry chỉ con ...
                $categoriesChildsNears = $this->categoriesResourceModel->where('parent_id', $cid)->getAll();

                $childs_id = [];

                //đổi list object thành mảng
                if ($categoriesChilds) {
                    foreach ($categoriesChilds as  $c) {
                        array_push($childs_id, $c->getId());
                    }
                }

                // nếu đối parent_id cho con cháu ...
                // con trực tiếp sẽ đặt lại parent_id thành parent id hiện tại => lên 1 nấc
                if (in_array($category_parent, $childs_id)) {
                    foreach ($categoriesChildsNears as  $c) {
                        $c->setParent_id($category->getParent_id());
                    }

                    $category->setParent_id($category_parent);

                    if ($this->categoriesResourceModel->save($category, ...$categoriesChildsNears)) {
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }
                }

                $category->setParent_id($category_parent);

                if ($this->categoriesResourceModel->save($category)) {
                    MSG::send('Sửa danh mục ' .  $category->getName() . ' thành công', 'success');
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    /**
     * Index
     * 
     * @param AcctionName Xóa danh mục
     */
    function delete($params)
    {
        if (isset($params['cid'])) {

            // lấy bảng chính
            $category = $this->categoriesResourceModel->getById($params['cid']);

            if ($category) {
                $categoriesChilds  =   $this->categoriesResourceModel->categoriesAllChild($category->getId());
                array_unshift($categoriesChilds, $category);

                if ($categoriesChilds) {

                    $listShow = [];

                    foreach ($categoriesChilds as $c) {
                        // lấy các bảng phụ

                        $showCategory = new \stdClass;
                        $showCategory->category_id = $c->getId();
                        $showCategory->category_name = $c->getName();

                        $products = $this->productsResourceModel->where('category_id', $c->getId())->getAllInclule('id,name');

                        if ($products) {
                            $showproducts = [];
                            foreach ($products as $p) {

                                $showproduct = new \stdClass;
                                $showproduct->product_id = $p->getId();
                                $showproduct->product_name = $p->getName();


                                array_push($showproducts, $showproduct);
                            }

                            $showCategory->products = $showproducts;
                        }
                        array_push($listShow, $showCategory);
                    }
                }
            }
            echo json_encode($listShow, JSON_UNESCAPED_UNICODE);
        }
        /////////////////////////////////////

        if (isset($_POST['cid'])) {

            $will_deletes = [];

            // lấy bảng chính
            $category = $this->categoriesResourceModel->getById($_POST['cid']);

            if ($category) {
                $categoriesChilds  =   $this->categoriesResourceModel->categoriesAllChild($category->getId());

                if ($categoriesChilds) {

                    foreach ($categoriesChilds as $c) {
                        // lấy các bảng phụ
                        $products = $this->productsResourceModel->where('category_id', $c->getId())->getAllInclule('id,name');

                        if ($products) {
                            foreach ($products as $p) {
                                $images =  $this->imagesResourceModel->select('id')->where('product_id', $p->getId())->getAll();

                                if ($images) {
                                    foreach ($images as $i) {
                                        array_push($will_deletes, $i);
                                    }
                                }
                            }
                            array_push($will_deletes, $p);
                        }
                        array_push($will_deletes, $c);
                    }
                }
                array_push($will_deletes, $category);
            }


            if ($this->categoriesResourceModel->delete(...$will_deletes)) {
                echo 'true';
                MSG::send('Xóa danh mục thành công', 'success');
                die;
            } else {
                MSG::send('Xóa danh mục thất bại');
                echo 'false';
                die;
            }
        }
        die;
    }
}
