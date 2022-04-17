<?php

namespace SRC\Controllers;

use SRC\Core\Controller;
use SRC\Models\Image\ImageResourceModel;
use SRC\Models\Product\ProductResourceModel;


class HomeController extends Controller
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
        $this->render("index");
    }

    function modal($params)
    {
        $d['product'] = $this->productResourceModel->getById($params['pid']);

        $this->set($d);
        $this->setLayout('');
        echo  $this->render("modal");
    }
}
