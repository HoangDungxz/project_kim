<?php

namespace SRC\Controllers;

use SRC\Core\Controller;
use SRC\Models\Category\CategoryResourceModel;
use SRC\Models\Product\ProductResourceModel;



class ProductsController extends Controller
{
    private $productResourceModel;
    function __construct()
    {
        $this->productResourceModel = new ProductResourceModel();
        $this->categoryResourceModel = new CategoryResourceModel();
    }
    function index($params)
    {
        $d['products'] = $this->productResourceModel->where('category_id', $params['cid'])->getAll($params);

        // tạo breadcrumb
        $categoryId = $params['cid'] ?? null;
        if ($categoryId != null) {
            $d['categoriesWithParents'] = array_reverse($this->categoryResourceModel->getWithParents($categoryId));
        }



        // tạo sub category
        $d['chidCategories'] = $this->categoryResourceModel->getCategoriesWithParents([
            'parent_id' => $categoryId,
            'get_product_count' => true
        ]);

        $this->set($d);
        $this->setView('product_list');
        $this->render("index");
    }

    public function detail($params)
    {
        if (!isset($params['pid'])) {
            header("Location: " . WEBROOT);
        }
        $d['product'] = $this->productResourceModel->get($params['pid']);

        $this->set($d);
        $this->setView('product_detail');
        $this->render("index");
    }

    function ajaxSearch($params)
    {
        $d['products'] = $this->productResourceModel->getAll(array_merge(['pageNum' => 5], $params));

        $this->set($d);
        $this->setLayout('');
        echo  $this->render("ajaxSearch");
    }

    private function breadcrumbs()
    {
    }
}
