<?php

namespace SRC\Controllers;

use SRC\Core\Controller;
use SRC\helper\SESSION;
use SRC\Models\Customer\CustomerModel;
use SRC\Models\Customer\CustomerResourceModel;

class CustomersController extends Controller
{
    private $customerResourceModel;
    public function __construct()
    {
        $this->customerResourceModel = new CustomerResourceModel();
    }
    function login()
    {
        $d = [];
        if (isset($_POST['login_email']) && isset($_POST['login_pass'])) {
            $customer =  new CustomerModel();

            $customer->setEmail($_POST['login_email']);
            $customer->setPassword($_POST['login_pass']);

            $login = $this->customerResourceModel->login($customer);

            if ($login == true) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                $d['message']  = 'Địa chỉ email hoặc mật khẩu của bạn không chính xác. Vui lòng thử lại. Nếu bạn quên chi tiết đăng nhập của mình, chỉ cần nhấp vào liên kết `Quên mật khẩu?` đường dẫn phía dưới.';
            }
        }
        $this->set($d);
        $this->render("login");
    }

    public function logout()
    {
        $this->customerResourceModel->remove();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
