<?php

namespace ADMIN\Controllers;

use SRC\helper\MSG;
use SRC\Models\Order\OrderResourceModel;
use SRC\Models\OrderDetail\OrderDetailResourceModel;

/**
 * HomeController
 * 
 * @param ControllerName Quản đơn hàng
 * @param SortOrder 6
 * @param Icon fas fa-cart-plus
 */
class OrderController  extends AdminControllers
{
    private $orderResourceModel;
    private $orderDetailResourceModel;
    public function __construct()
    {
        parent::__construct();
        $this->orderResourceModel =  new OrderResourceModel();
        $this->orderDetailResourceModel =  new OrderDetailResourceModel();
    }

    /**
     * Index
     * 
     * @param AcctionName Danh sách đơn hàng
     */
    function index()
    {
        $orders = $this->orderResourceModel
            ->join('customers', 'orders.customer_id=customers.id')
            ->join('orderdetails', 'orders.id=orderdetails.order_id')
            ->select('orders.*,
            customers.id as customers_id, customers.name as customers_name,
            customers.address as customers_address, customers.phone as customers_phone,
            SUM(orderdetails.quantity) as sum_quantity,SUM(orderdetails.price) as sum_price')
            ->groupBy('orders.id')
            ->order('orders.id')
            ->getAll();

        $this->with($orders);

        $this->render("index");
    }

    /**
     * Index
     * 
     * @param AcctionName Thay đổi trạng thái đơn hàng
     */
    function change_status($params)
    {
        if (!isset($params['oid'], $params['status'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        $order = $this->orderResourceModel->getById($params['oid']);
        $order->setStatus($params['status']);
        if ($this->orderResourceModel->change_status($order)) {
            MSG::send('Sửa trạng thái đơn hàng thành công', 'success');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die;
        }
    }

    /**
     * Index
     * 
     * @param AcctionName Xem chi tiết đơn hàng
     */
    public function order_detail($params)
    {
        if (!isset($params['oid'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        $order = $this->orderResourceModel
            ->join('customers', 'orders.customer_id=customers.id', 'LEFT OUTER JOIN')
            ->join('orderdetails', 'orders.id=orderdetails.order_id', 'LEFT OUTER JOIN')
            ->select('orders.*,
            customers.email as customers_email, customers.name as customers_name,
            customers.address as customers_address, customers.phone as customers_phone,
            SUM(orderdetails.quantity) as sum_quantity,SUM(orderdetails.price) as sum_price')
            ->groupBy('orders.id')
            ->order('orders.id')
            ->where('orders.id', $params['oid'])
            ->get();

        $orderDetail = $this->orderDetailResourceModel
            ->join('products', 'products.id=orderdetails.product_id', 'LEFT OUTER JOIN')
            ->join('productimages', 'products.id=productimages.product_id', 'LEFT OUTER JOIN')
            ->groupBy('orderdetails.id')
            ->select('orderdetails.*,
                products.name as products_name,products.discount as products_discount,products.price as products_price,
                COALESCE(MAX(productimages.path), "default-product-image.png") as productimages_path
            ')
            ->where('orderdetails.order_id', $params['oid'])
            ->getAll();

        $this->with($order);
        $this->with($orderDetail);

        $this->render("order_detail");
    }
}
