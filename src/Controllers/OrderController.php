<?php

namespace SRC\Controllers;

use SRC\helper\SESSION;
use SRC\helper\URL;
use SRC\Models\Customer\CustomerResourceModel;
use SRC\Models\Order\OrderModel;
use SRC\Models\Order\OrderResourceModel;
use SRC\Models\OrderDetail\OrderDetailModel;
use SRC\Models\OrderDetail\OrderDetailResourceModel;

class OrderController extends FrontendControllers
{
    private $orderResource;
    private $orderDetailResource;
    private $customerResourceModel;


    function __construct()
    {
        parent::__construct();
        $this->orderResource = new OrderResourceModel();
        $this->orderDetailResource = new OrderDetailResourceModel();
        $this->customerResourceModel = new CustomerResourceModel();
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
            // header('Location: ' . WEBROOT . 'customers/login');

            $this->render('login', false, 'Customers');

            die;
        }

        extract($params);

        $product_price_affter_discount = str_replace('_', '.', $product_price_affter_discount);

        $customerId = SESSION::get('customers', 'id');

        $orderModel = new OrderModel();

        $orderModel->setCustomer_id($customerId)
            ->setDate(date("Y-m-d H:i:s"))
            ->setStatus(0);

        $orderModel->send_id_to_child = true;

        $orderDetail = new OrderDetailModel();

        if (isset($product_id)) {
            $orderDetail->setProduct_id($product_id);
        }


        if (isset($saleagent)) {

            // Lây mã đại lý rồi giải mã
            $customerId = $this->customerResourceModel
                ->select('customers.id as customers_id')
                ->where('email', URL::base64_decode_url($saleagent))->get();

            if ($customerId) {
                $customerId = $customerId->customers_id;

                $orderDetail->setAgent_id($customerId);
            }
        }


        $orderDetail
            ->setQuantity($product_quantity ?? 1)
            ->setPrice(
                ($product_quantity ?? 1) * $product_price_affter_discount
            );

        $orderDetail->parent_id = 'order_id';


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

    function checkout($params)
    {
        if (!isset($params['oid'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        $order = $order = $this->orderResource->getById($params['oid']);

        if ($order) {

            if ($this->orderResource->checkout($order)) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}
