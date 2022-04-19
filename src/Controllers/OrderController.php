<?php

namespace SRC\Controllers;

use SRC\helper\SESSION;
use SRC\Models\Order\OrderModel;
use SRC\Models\Order\OrderResourceModel;
use SRC\Models\OrderDetail\OrderDetailModel;
use SRC\Models\OrderDetail\OrderDetailResourceModel;

class OrderController extends FrontendControllers
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
            ->setDate(date("Y-m-d H:i:s"))
            ->setStatus(0);

        $orderModel->send_id_to_child = true;

        $orderDetail = new OrderDetailModel();
        $orderDetail
            ->setProduct_id(
                isset($product_id) ? $product_id : $params['product_id']
                // $product_id
            )
            ->setQuantity($product_quantity ?? 1)
            ->setPrice(isset($product_price_affter_discount) ?
                $product_quantity * $product_price_affter_discount :
                $params['product_price_affter_discount']);

        $orderDetail->parentRequire = 'order_id';


        if (
            $this->orderResource->save($orderModel, $orderDetail)
        ) {
            header('Location: ' . WEBROOT . 'order/index');
        }
    }

    function delete($params)
    {

        if (!isset($params['odid'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        $orderDetail = $this->orderDetailResource->getById($params['odid']);
        if (!$orderDetail) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        $orderId =  $orderDetail->getOrder_id();

        if ($this->orderDetailResource->delete($orderDetail)) {

            $orderDetail = $this->orderDetailResource->where('order_id', $orderId)->get();

            if (!$orderDetail) {
                $order = new OrderModel();
                $order->setId($orderId);

                $this->orderResource->delete($order);
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
        }
    }

    public function delete_order($params)
    {
        if (!isset($params['oid'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        $order = new OrderModel();
        $order->setId($params['oid']);

        $orderDetails = $this->orderDetailResource
            ->where("order_id", $params['oid'])
            ->getAll() ?? [];

        if ($this->orderResource->delete($order, ...$orderDetails)) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function update()
    {

        extract($_POST);

        $saveArray = [];
        if (isset($ord)) {
            foreach ($ord as $key => $o) {
                $orderDetail = $this->orderDetailResource->getById($o['order_detail_id']);
                if ($orderDetail) {
                    $orderDetail->setPrice($o['order_detail_price'])
                        ->setQuantity($o['order_detail_quantity']);
                }
                array_push($saveArray, $orderDetail);
            }

            if ($this->orderDetailResource->save(...$saveArray)) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            };
        }
    }
}
