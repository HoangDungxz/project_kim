<?php

namespace SRC\Controllers;

use SRC\Core\Controller;
use SRC\helper\SESSION;
use SRC\Models\Order\OrderModel;
use SRC\Models\Order\OrderResourceModel;
use SRC\Models\OrderDetail\OrderDetailModel;
use SRC\Models\OrderDetail\OrderDetailResourceModel;

class OrderController extends Controller
{
    private $orderResource;
    private $orderDetailResource;


    function __construct()
    {
        $this->orderResource = new OrderResourceModel();
        $this->orderDetailResource = new OrderDetailResourceModel();
    }

    function index()
    {
        if (SESSION::get('customers') == null) {
            header('Location: ' . WEBROOT . 'customers/login');
        }

        $this->render("index");
    }

    function create($params)
    {
        if (SESSION::get('customers') == null) {
            header('Location: ' . WEBROOT . 'customers/login');
        }

        extract($_POST);

        $customerId = SESSION::get('customers', 'id');

        $orderModel = new OrderModel();

        $orderModel->setCustomer_id($customerId)
            ->setPrice(($product_price ?? $params['product_price']) * ($product_quantity ?? 1))
            ->setDate(date("Y-m-d H:i:s"))
            ->setStatus(0);

        $orderDetail = new OrderDetailModel();
        $orderDetail
            ->setProduct_id($product_id ?? $params['product_id'])
            ->setQuantity($product_quantity ?? 1)
            ->setPrice($product_price ?? $params['product_price']);
        $orderDetail->parentRequire = 'order_id';


        try {
            $this->orderResource->save($orderModel, $orderDetail);
            // header('Location: ' . WEBROOT . 'order/index');
        } catch (\Exception $th) {
            //throw $th;
            die();
        }



        // $this->render("index");
    }
}
