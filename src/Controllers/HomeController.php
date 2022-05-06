<?php

namespace SRC\Controllers;

use SRC\Models\Product\ProductResourceModel;


class HomeController extends FrontendControllers
{
    private $productResourceModel;
    function __construct()
    {
        parent::__construct();
        $this->productResourceModel = new ProductResourceModel();
    }

    function index()
    {
        $newProducts = $this->productResourceModel->getAll(
            [
                "sort" => 'iddesc',
                'p' => 1,
                'pageNum' => 20
            ]
        );

        $discountProducts = $this->productResourceModel->getAll(
            [
                "sort" => 'discountdesc',
                'p' => 1,
                'pageNum' => 20
            ]
        );


        $this->with($newProducts);

        $this->with($discountProducts);
        $this->render("index", false);
    }

    function map()
    {
        $this->render("map");
    }

    function news()
    {
        $this->render("news");
    }


    function notFound()
    {
        $this->setLayout(false);
        echo  $this->render("notFound");
    }
}
