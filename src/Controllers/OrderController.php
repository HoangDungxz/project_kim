<?php

namespace SRC\Controllers;

use SRC\Core\Controller;
use SRC\helper\SESSION;
use SRC\Models\Order\OrderModel;
use SRC\Models\Order\OrderResourceModel;

class OrderController extends Controller
{
    private $orderResource;

    function __construct()
    {
        $this->orderResource = new OrderResourceModel();
    }

    function index()
    {
        if (SESSION::get('customers') == null) {
            header('Location: ' . WEBROOT . 'customers/login');
        }

        $this->render("index");
    }

    function create()
    {
        if (SESSION::get('customers') == null) {
            header('Location: ' . WEBROOT . 'customers/login');
        }

        extract($_POST);

        $customerId = SESSION::get('customers', 'id');

        $orderModel = new OrderModel();

        $orderModel->setCustomer_id($customerId);
        $orderModel->setPrice($product_price * $product_quantity);
        $orderModel->setDate(date("Y-m-d H:i:s"));
        $orderModel->setStatus(0);

        try {
            $this->orderResource->save($orderModel);
        } catch (\Exception $th) {
            //throw $th;
        }



        header('Location: ' . WEBROOT . 'order/index');

        // $this->render("index");
    }
}
