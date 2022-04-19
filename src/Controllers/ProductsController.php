<?php

namespace SRC\Controllers;

use SRC\Models\Category\CategoryResourceModel;
use SRC\Models\Image\ImageResourceModel;
use SRC\Models\Product\ProductResourceModel;



class ProductsController extends FrontendControllers
{
    private $productResourceModel;
    private $categoryResourceModel;

    function __construct()
    {
        $this->productResourceModel = new ProductResourceModel();
        $this->categoryResourceModel = new CategoryResourceModel();
        $this->imageResoureModel = new ImageResourceModel();
    }
    function index($params)
    {


        if (isset($params['cid'])) {
            $d['products'] = $this->productResourceModel->where('category_id', $params['cid'])
                ->getAll($params);
        } else {
            $d['products'] = $this->productResourceModel
                ->getAll($params);
        }

        // echo '<pre>';
        // print_r($d);
        // echo '</pre>';
        // die('www');
        // tạo breadcrumb  
        $categoryId = $params['cid'] ?? null;
        if ($categoryId != null) {
            $d['categoriesWithParents'] = array_reverse($this->categoryResourceModel->getWithParents($categoryId));
        } else {
            $d['categoriesWithParents'] = null;
        }

        // tạo sub category
        $d['childCategories'] = $this->categoryResourceModel->getChildCategories([
            'parent_id' => $categoryId
        ]);

        $this->set($d);

        $this->render("product_list");
    }

    public function detail($params)
    {
        if (!isset($params['pid'])) {
            header("Location: " . WEBROOT);
        }
        $d['product'] = $this->productResourceModel->get($params);

        if ($d['product'] == false) {
            header("Location: " . WEBROOT);
        }
        $category = $this->categoryResourceModel->getById($d['product']->getCategory_id());

        if ($category != false) {
            $d['categoriesWithParents'] = array_reverse($this->categoryResourceModel->getWithParents($category->getId()));
        } else {
            $d['categoriesWithParents'] = null;
        }

        $d['childBreadcrumb'] = $d['product']->getName();

        $this->set($d);
        $this->render("product_detail");
    }

    function ajaxSearch($params)
    {
        $d['products'] = $this->productResourceModel->getAll(array_merge(['pageNum' => 5], $params));

        $this->set($d);
        $this->setLayout(false);
        echo  $this->render("ajaxSearch");
    }
}
