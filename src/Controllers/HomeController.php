<?php

namespace SRC\Controllers;

use SRC\Core\Controller;
use SRC\Models\Product\ProductResourceModel;


class HomeController extends Controller
{
    function index()
    {

        $productResourceModel = new ProductResourceModel();

        $d['newProducts'] = $productResourceModel->getAll(
            [
                "sort" => 'iddesc'
            ]
        );

        $d['discountProducts'] = $productResourceModel->getAll(
            [
                "sort" => 'discountdesc'
            ]
        );

        $this->set($d);
        $this->render("index");
    }
}
