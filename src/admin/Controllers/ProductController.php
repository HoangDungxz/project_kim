<?php

namespace ADMIN\Controllers;

use SRC\Models\Product\ProductResourceModel;

/**
 * ProductController
 * 
 * @param ControllerName Quản lý sản phẩm
 * @param SortOrder 4
 * @param Icon fas fa-box-open
 */
class ProductController extends AdminControllers
{
    private $productsResourceModel;
    public function __construct()
    {
        parent::__construct();
        $this->productsResourceModel = new ProductResourceModel();
    }
    /**
     * Index
     * 
     * @param AcctionName Danh sách tài khoản
     */
    function index()
    {
        $products = $this->productsResourceModel->getAll();
        $this->with($products);

        $this->render("index");
    }
}
