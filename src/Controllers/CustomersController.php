<?php

namespace SRC\Controllers;

use SRC\helper\MSG;
use SRC\helper\SESSION;
use SRC\Models\Customer\CustomerModel;
use SRC\Models\Customer\CustomerResourceModel;
use SRC\Models\Order\OrderResourceModel;
use SRC\Models\OrderDetail\OrderDetailResourceModel;

class CustomersController extends FrontendControllers
{
    private $customerResourceModel;
    private $orderResourceModel;
    private $orderDetailResourceModel;
    private $commission_from_child = 0;
    private $child_agents = [];
    public function __construct()
    {
        parent::__construct();
        $this->customerResourceModel = new CustomerResourceModel();
        $this->orderResourceModel =   new OrderResourceModel();
        $this->orderDetailResourceModel =   new OrderDetailResourceModel();
    }

    function detail($params)
    {
        $id = SESSION::get('customers', 'id');

        // Lấy đường dẫn để include
        $page  = isset($params['page']) ? $params['page'] : 'detail_info';
        $page  = ROOT . 'src\Views\Customers\details\\' . $page . '.php';

        // Lấy Đơn hàng

        if ($params['page'] = 'order') {
            $orders = $this->orderResourceModel
                ->join('orderdetails', 'orderdetails.order_id=orders.id')
                ->select('orders.*,COUNT(orderdetails.id) as count_item,
            SUM(orderdetails.quantity) as sum_products, SUM(orderdetails.price) as sum_price')
                ->groupBy('orderdetails.order_id')
                ->where('customer_id', $id)
                ->getAll();

            $this->with($orders);
        }

        // Lấy chi tiết Đơn hàng
        if ($params['page'] = 'detail_order' && isset($params['oid'])) {

            $orderDetail = $this->orderDetailResourceModel
                ->join('products', 'products.id=orderdetails.product_id')
                ->join('productimages', 'products.id=productimages.product_id')
                ->groupBy('orderdetails.id')
                ->select('orderdetails.*,
                products.name as products_name,products.discount as products_discount,products.price as products_price,
                COALESCE(MAX(productimages.path), "default-product-image.png") as productimages_path')
                ->where('orderdetails.order_id', $params['oid'])
                ->getAll();

            $this->with($orderDetail);
        }

        // Lấy detail_Tiền lãi bán hàng
        if ($params['page'] = 'sale_commission') {
            // thông tin tiền hàng bán được

            $sale_agent = $this->customerResourceModel
                ->select('customers.*,SUM(orderdetails.price * 20 / 100) as sum_price')
                ->join('orderdetails', 'orderdetails.agent_id = customers.id')
                ->where('customers.id', $id)
                ->groupBy('customers.id')
                ->get();

            $this->with($sale_agent);


            $sale_success = $this->customerResourceModel
                ->join('orderdetails', 'orderdetails.agent_id = customers.id')

                ->join('products', 'products.id=orderdetails.product_id')

                ->where('customers.id', $id)

                ->join('orders', 'orders.id=orderdetails.order_id')

                ->where('orders.status', 4)

                ->select('customers.*,orderdetails.price * 20 / 100 as commission,
            orders.status as  orders_status, orders.date as  orders_date,
            products.name as products_name')
                ->getAll();

            $this->with($sale_success);
        }

        // Tiền lãi đại lý cấp dưới
        if ($params['page'] = 'agents_commission') {
            $sale_agents = $this->customerResourceModel
                ->getAll();
            $this->countCommissionFromChild($sale_agents, $id, 1);

            $commission_from_child = $this->commission_from_child;
            $this->with($commission_from_child);

            $child_agents = $this->child_agents;
            $this->with($child_agents);
        }


        $this->with($page);
        $this->render("detail", false);
    }

    function login()
    {
        $message = null;

        if (isset($_POST['login_email']) && isset($_POST['login_pass'])) {
            $customer =  new CustomerModel();

            $customer->setEmail($_POST['login_email']);
            $customer->setPassword($_POST['login_pass']);

            $login = $this->customerResourceModel->login($customer);

            if ($login == true) {
                MSG::send('Đăng nhập thành công', 'success');
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                die;
            } else {

                MSG::send('Địa chỉ email hoặc mật khẩu của bạn không chính xác. Vui lòng thử lại. Nếu bạn quên chi tiết đăng nhập của mình, chỉ cần nhấp vào liên kết `Quên mật khẩu?` đường dẫn phía dưới.');
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                die;
            }
        }
        $this->with($message);

        $this->render("login", false);
    }

    public function logout()
    {
        $this->customerResourceModel->remove();
        MSG::send('Đăng xuất thành công', 'success');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die;
    }

    public function register()
    {
        extract($_POST);


        if (
            isset($register_name, $register_phone, $register_email, $register_pass, $register_address)
            && $register_name != null
            && $register_name != null && $register_phone != null && $register_email != null && $register_pass !=
            null && $register_address != null
        ) {

            $customer = new CustomerModel();
            $customer->setName($register_name);
            $customer->setPhone($register_phone);
            $customer->setEmail($register_email);
            $customer->setPassword(md5($register_pass));
            $customer->setAddress($register_address);

            //tạo file name

            extract($_FILES);

            if ($register_avartar['name'] != null) {
                $avatar =  $this->customerResourceModel->upload($register_avartar);
            }

            $customer->setAvatar($avatar ?? 'default_customer_image.jpg');

            if ($this->customerResourceModel->save($customer)) {
                MSG::send('Đăng ký thành công', 'success');

                $this->customerResourceModel->loginAfterRegister($customer);

                MSG::send('Đăng nhập thành công', 'success');

                header('Location: ' . WEBROOT);
                die;
            } else {
                MSG::send('Đăng ký lỗi');

                header('Location: ' . $_SERVER['HTTP_REFERER']);
                die;
            }
        } else {

            $msg = '';

            foreach (array_reverse($_POST) as $key => $post) {
                if ($post == null) {

                    switch ($key) {
                        case 'register_name':
                            $msg = 'Tên đăng nhập ';
                            MSG::send($msg . ' Không được để trống');
                            break;
                        case 'register_phone':
                            $msg = 'Số điện thoại ';
                            MSG::send($msg . ' Không được để trống');
                            break;
                        case 'register_email':
                            $msg = 'Email ';
                            MSG::send($msg . ' Không được để trống');
                            break;
                        case 'register_pass':
                            $msg = 'Mật khẩu ';
                            MSG::send($msg . ' Không được để trống');
                            break;
                        case 'register_address':
                            $msg = 'Địa chỉ ';
                            MSG::send($msg . ' Không được để trống');
                            break;
                        default:
                            # code...
                            break;
                    }
                }
            }
        }

        $this->render('register', false);
    }


    public function change_info()
    {
        extract($_POST);

        $id = SESSION::get('customers', 'id');



        if (
            isset($register_name, $register_phone, $register_email, $register_address)
            && $register_name != null
            && $register_name != null && $register_phone != null && $register_email != null  && $register_address != null
        ) {

            $customer =  $this->customerResourceModel->getById($id);

            $customer->setName($register_name);
            $customer->setPhone($register_phone);
            $customer->setEmail($register_email);

            $customer->setAddress($register_address);

            if (isset($register_pass) && $register_pass != null) {
                $customer->setPassword(md5($register_pass));
            }


            //tạo file name

            extract($_FILES);

            if ($register_avartar['name'] != null) {
                $avatar =  $this->customerResourceModel->upload($register_avartar);
                $customer->setAvatar($avatar ?? 'default_customer_image.jpg');
            }


            if ($this->customerResourceModel->save($customer)) {
                MSG::send('Thay đổi tài khoản thành công', 'success');

                $this->customerResourceModel->loginAfterRegister($customer);

                header('Location: ' . $_SERVER['HTTP_REFERER']);
                die;
            } else {
                MSG::send('Thay đổi lỗi');

                header('Location: ' . $_SERVER['HTTP_REFERER']);
                die;
            }
        } else {

            $msg = '';

            foreach (array_reverse($_POST) as $key => $post) {
                if ($post == null) {

                    switch ($key) {
                        case 'register_name':
                            $msg = 'Tên đăng nhập ';
                            MSG::send($msg . ' Không được để trống');
                            break;
                        case 'register_phone':
                            $msg = 'Số điện thoại ';
                            MSG::send($msg . ' Không được để trống');
                            break;
                        case 'register_email':
                            $msg = 'Email ';
                            MSG::send($msg . ' Không được để trống');
                            break;
                        case 'register_address':
                            $msg = 'Địa chỉ ';
                            MSG::send($msg . ' Không được để trống');
                            break;
                        default:
                            # code...
                            break;
                    }
                }
            }
        }

        $this->render('register', false);
    }

    private function countCommissionFromChild($sale_agents, $superior_agent_id = 0, $lv = 1, $char = '')
    {
        $lv = $lv * 2;
        foreach ($sale_agents as $key => $s) {

            // Nếu là chuyên mục con thì hiển thị
            if ($s->getSuperior_agent_id() == $superior_agent_id && $s->getSuperior_agent_id() != null) {

                $sale_agent = $this->customerResourceModel
                    ->select('customers.*,SUM(orderdetails.price * 20 / 100) / ' . $lv . ' as sum_price')
                    ->join('orderdetails', 'orderdetails.agent_id = customers.id')
                    ->where('customers.id', $s->getId())
                    ->groupBy('customers.id')
                    ->get();

                if ($sale_agent) {
                    # code...


                    $sale_agent->char = $char;

                    $this->commission_from_child += $sale_agent->sum_price;

                    array_push($this->child_agents,  $sale_agent);

                    unset($sale_agents[$key]);

                    $this->countCommissionFromChild($sale_agents, $s->getId(), $lv, $char . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
                }
            }
        }
    }
}
