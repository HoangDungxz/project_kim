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

        $d['order'] = $this->orderResource
            ->where('customer_id', SESSION::get('customers', 'id'))
            ->get();

        if ($d['order']) {
            $d['orderDetails'] = $this->orderDetailResource
                ->where('order_id', $d['order']->getId())
                ->join('products', 'products.id=orderdetails.product_id')
                ->select('
            products.id as product_id,
            products.name as product_name,
            products.description as product_description,

            products.hot as product_hot,
            products.price as product_price,
            products.discount as product_discount,
            products.category_id as product_category_id,
            products.brand_id as product_brand_id,
            orderdetails.id as orderdetail_id,
            orderdetails.order_id as orderdetail_order_id,
            orderdetails.product_id as orderdetail_product_id,
            orderdetails.quantity as orderdetail_quantity,
            orderdetails.price as orderdetail_price')
                ->setFetchClass(\SRC\Models\Order\OrderFrontendViewModel::class)
                ->getFrontendOrderView();
        } else {
            $d['orderDetails'] = false;
        }

        $this->set($d);
        $this->render("carts_list");
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

        if (
            $this->orderResource->save($orderModel, $orderDetail)
        ) {
            header('Location: ' . WEBROOT . 'order/index');
        }
    }
}
