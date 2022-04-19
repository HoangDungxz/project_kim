<?php

namespace SRC\Controllers;

use SRC\Models\Product\ProductResourceModel;


class HomeController extends FrontendControllers
{
    private $productResourceModel;
    function __construct()
    {
        $this->productResourceModel = new ProductResourceModel();
    }

    function index()
    {
        $d['newProducts'] = $this->productResourceModel->getAll(
            [
                "sort" => 'iddesc'
            ]
        );

        $d['discountProducts'] = $this->productResourceModel->getAll(
            [
                "sort" => 'discountdesc'
            ]
        );

        $this->set($d);
        $this->render("index", false);
    }

    function modal($params)
    {
        $d['product'] = $this->productResourceModel->get($params);

        $this->set($d);
        $this->setLayout(false);
        echo  $this->render("modal");
    }
}
