<?php

namespace SRC\Controllers;

use SRC\Core\Controller;
use SRC\helper\SESSION;
use SRC\Models\Category\CategoryResourceModel;

class FrontendControllers extends Controller
{

    function __construct()
    {
        $this->getCategories();
        $this->getOrder();
    }

    private function getCategories()
    {
        $categories = new CategoryResourceModel();
        $this->with($categories);
    }

    private function getOrder()
    {
        $orderResourceClass = "SRC\Models\Order\OrderResourceModel";
        $orderDetailResourceClass =  "SRC\Models\OrderDetail\OrderDetailResourceModel";
        $orderResource = new $orderResourceClass;
        $orderDetailResource = new $orderDetailResourceClass;

        $order = null;
        $orderDetails = null;
        $orders_count = 0;

        if (SESSION::get('customers') != null) {

            $order = $orderResource
                ->where('customer_id', SESSION::get('customers', 'id'))
                ->get() ?? [];

            if ($order) {
                $orderDetails = $orderDetailResource
                    ->where('order_id', $order->getId())
                    ->join('products', 'products.id=orderdetails.product_id')
                    ->select(
                        '
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
            orderdetails.price as orderdetail_price'
                    )
                    ->setFetchClass(\SRC\Models\Order\OrderFrontendViewModel::class)
                    ->getFrontendOrderView() ?? [];

                $orders_count = $orderDetailResource
                    ->select('sum(orderdetails.quantity) as orderdetails_sum_quantity')
                    ->where('order_id', $order->getId())
                    ->get()->orderdetails_sum_quantity;
            } else {
                $orderDetails = false;
            }

            $this->with($order);
            $this->with($orderDetails);
            $this->with($orders_count);
        }
    }
}
