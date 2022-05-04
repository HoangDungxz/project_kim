<?php

namespace ADMIN\Controllers;

use SRC\Models\Customer\CustomerResourceModel;
use SRC\Models\Order\OrderResourceModel;
use SRC\Models\Permission\PermissionResourceModel;
use SRC\Models\Product\ProductResourceModel;
use SRC\Models\User\UserResourceModel;

/**
 * HomeController
 * 
 * @param ControllerName Trang chủ
 * @param SortOrder 1
 * @param Icon fas fa-columns
 */
class HomeController extends AdminControllers
{


    private $userResourceModel;
    private $customerResourceModel;
    private $productsResourceModel;
    private $orderResourceModel;
    public function __construct()
    {
        parent::__construct();
        $this->userResourceModel = new UserResourceModel();
        $this->permissionResourceModel = new PermissionResourceModel();
        $this->customerResourceModel =  new CustomerResourceModel();
        $this->productsResourceModel = new ProductResourceModel();
        $this->orderResourceModel =  new OrderResourceModel();
    }
    /**
     * Index
     * 
     * @param AcctionName Xem thống kế
     */
    function index()
    {
        // Tính số tài khoản
        $users_count = $this->userResourceModel->select('COUNT(users.id) as count_users')->get();
        $countUsers = $users_count ? $users_count->count_users : 0;
        $this->with($countUsers);

        // Tính số khách hàng
        $customers_count = $this->customerResourceModel->select('COUNT(customers.id) as count_customers')->get();
        $countCustomers = $customers_count ? $customers_count->count_customers : 0;
        $this->with($countCustomers);

        // Tính số sản phẩm
        $countProducts = $this->productsResourceModel->countProducts();
        $this->with($countProducts);

        // Tính số đơn mới
        $orders_count = $this->orderResourceModel
            ->where('status', 1)
            ->select('COUNT(orders.id) as count_orders')->get();
        $countOrders = $orders_count ? $orders_count->count_orders : 0;
        $this->with($countOrders);

        // SELECT SUM(id),MONTH(date),YEAR(date) FROM `orders` GROUP BY MONTH(date),YEAR(date)


        // echo '<pre>';
        // print_r($sales_revenues);
        // echo '</pre>';
        // die;


        $this->render("index");
    }



    /**
     * Index
     * 
     * @param AcctionName Biểu đồ doanh thu
     */
    function ajax_proceeds()
    {
        // bỏ layout
        $this->setLayout(false);

        extract($_POST);

        // nếu ajax truyền ngày bắt đầu và kết thức
        if (isset($date_from, $date_to)) {

            // ngày đầu tiên của thánh bắt đầu
            $date_from = $date_from . '-01';

            // ngày cuối của thánh kết thúc
            $d = new \DateTime($date_to);
            $date_to =  $d->format('Y-m-t');

            $sales_revenues = $this->orderResourceModel
                ->join('orderdetails', 'orderdetails.order_id=orders.id')
                ->select('SUM(orderdetails.price) as sum_price,
            SUM(orderdetails.quantity) as sum_quantity,
            MONTH(orders.date) as month,
            YEAR(orders.date) as year')
                ->where('orders.status', 4)
                ->between2('orders.date', $date_from . '_' . $date_to)
                ->groupBy('MONTH(orders.date),YEAR(orders.date)')
                ->getAll();

            echo json_encode($sales_revenues, JSON_UNESCAPED_UNICODE);
        }
    }




    function notFound()
    {

        $this->render("not_found", false);
    }
}
