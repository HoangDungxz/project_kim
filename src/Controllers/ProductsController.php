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
        parent::__construct();
        $this->productResourceModel = new ProductResourceModel();
        $this->categoryResourceModel = new CategoryResourceModel();
        $this->imageResoureModel = new ImageResourceModel();
    }
    function index($params)
    {
        $params['p'] = $params['p'] ?? 1;

        if (count($params) > 0) {
            $products = $this->productResourceModel
                ->getAll($params);
            unset($params['p']);
            $countProducts = count($this->productResourceModel->getAll($params));
        } else {
            $products = $this->productResourceModel
                ->getAll($params);

            $countProducts = $this->productResourceModel->countProducts();
        }

        $categoryId = $params['cid'] ?? null;

        if ($categoryId != null) {
            $categoriesWithParents = array_reverse($this->categoryResourceModel->getWithParents($categoryId));
        } else {
            $categoriesWithParents = null;
        }



        // tạo sub category
        $childCategories = $this->categoryResourceModel->getChildCategories([
            'parent_id' => $categoryId
        ]);


        $this->with($products);
        $this->with($childCategories);
        $this->with($categoriesWithParents);



        $this->with($countProducts);

        $this->render("product_list");
    }

    public function detail($params)
    {
        if (!isset($params['pid'])) {
            header("Location: " . WEBROOT);
        }
        $product = $this->productResourceModel->get($params);

        if ($product == false) {
            header("Location: " . WEBROOT);
        }
        $category = $this->categoryResourceModel->getById($product->getCategory_id());

        if ($category != false) {
            $categoriesWithParents = array_reverse($this->categoryResourceModel->getWithParents($category->getId()));
        } else {
            $categoriesWithParents = null;
        }

        $childBreadcrumb = $product->getName();

        $this->with($product);
        $this->with($categoriesWithParents);
        $this->with($childBreadcrumb);


        $this->render("product_detail");
    }

    function ajaxSearch($params)
    {
        $products = $this->productResourceModel->getAll(array_merge(['pageNum' => 5], $params));

        $this->with($products);
        $this->setLayout(false);
        echo  $this->render("ajaxSearch");
    }
}
