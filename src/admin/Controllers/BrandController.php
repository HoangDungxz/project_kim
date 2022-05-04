<?php

namespace ADMIN\Controllers;

use SRC\Models\Brand\BrandResourceModel;

/**
 * BrandController
 * 
 * @param ControllerName Quản thương hiệu
 * @param SortOrder 3
 * @param Icon fas fa-tape
 */
class BrandController  extends AdminControllers
{

    private $brandResourceModel;
    function __construct()
    {
        parent::__construct();
        $this->brandResourceModel = new BrandResourceModel();
    }

    /**
     * Index
     * 
     * @param AcctionName Danh sách hiệu
     */
    function index()
    {
        $brands = $this->brandResourceModel
            ->getAll();

        $this->with($brands);
        $this->render("index");
    }
}
