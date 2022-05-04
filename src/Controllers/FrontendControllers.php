<?php

namespace SRC\Controllers;

use SRC\Core\Controller;
use SRC\helper\SESSION;
use SRC\Models\Brand\BrandResourceModel;
use SRC\Models\Category\CategoryResourceModel;

class FrontendControllers extends Controller
{
    private $categoriesShow = '';
    private $brandResourceModel;
    function __construct()
    {

        $this->brandResourceModel = new BrandResourceModel();

        $this->getCategories();
        $this->getOrder();

        $categoriesResourceModel = new CategoryResourceModel();
        $categories = $categoriesResourceModel
            ->where('displayhomepage', 1)
            ->getAll();

        $this->showCategories($categories);
        $categoriesShow = $this->categoriesShow;
        $this->with($categoriesShow);


        $brands = $this->brandResourceModel->getAll();
        $this->with($brands);



        // die;
    }

    // BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
    function showCategories($categories, $parent_id = 0, $char = '')
    {
        // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
        $cate_child = array();
        foreach ($categories as $key => $item) {
            // Nếu là chuyên mục con thì hiển thị
            if ($item->getParent_id() == $parent_id) {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }
        // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
        if ($cate_child) {
            $this->categoriesShow .= '<div class="navPage-subMenu" id="navPages-60" tabindex="-1">
                                                <ul class="navPage-subMenu-list">';
            foreach ($cate_child as $key => $item) {
                // Hiển thị tiêu đề chuyên mục
                $this->categoriesShow .= ' <li class="navPage-subMenu-item">
                                    <a class="navPage-subMenu-action navPages-action has-subMenu" href="' . WEBROOT . 'products/index/cid/' . $item->getId() . '">
                                        <span>' . $item->getName() . '</span>
                                    </a>';

                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                $this->showCategories($categories, $item->getId(), $char . '|---');
                $this->categoriesShow .= '</li>';
            }
            $this->categoriesShow .= '</ul></div>';
        }
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
                ->where('status', 0)
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

                $orders_count = $orderDetailResource
                    ->select('sum(orderdetails.quantity) as orderdetails_sum_price')
                    ->where('order_id', $order->getId())
                    ->get()->orderdetails_sum_price;
            } else {
                $orderDetails = false;
            }

            $this->with($order);
            $this->with($orderDetails);
            $this->with($orders_count);
        }
    }
}
