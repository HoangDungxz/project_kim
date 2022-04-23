<?php

namespace SRC\Controllers;

use SRC\Models\Customer\CustomerModel;
use SRC\Models\Customer\CustomerResourceModel;

class CustomersController extends FrontendControllers
{
    private $customerResourceModel;
    public function __construct()
    {
        parent::__construct();
        $this->customerResourceModel = new CustomerResourceModel();
    }
    function login()
    {
        $message = null;

        $d = [];
        if (isset($_POST['login_email']) && isset($_POST['login_pass'])) {
            $customer =  new CustomerModel();

            $customer->setEmail($_POST['login_email']);
            $customer->setPassword($_POST['login_pass']);

            $login = $this->customerResourceModel->login($customer);

            if ($login == true) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                $message  = 'Địa chỉ email hoặc mật khẩu của bạn không chính xác. Vui lòng thử lại. Nếu bạn quên chi tiết đăng nhập của mình, chỉ cần nhấp vào liên kết `Quên mật khẩu?` đường dẫn phía dưới.';
            }
        }
        $this->with($message);
        $this->render("login", false);
    }

    public function logout()
    {
        $this->customerResourceModel->remove();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function register()
    {


        extract($_POST);

        if (isset($register_name) && isset($register_phone) && isset($register_email) && isset($register_pass)) {
            $customer = new CustomerModel();
            $customer->setName($register_name);
            $customer->setPhone($register_phone);
            $customer->setEmail($register_email);
            $customer->setPassword($register_pass);

            //tạo file name

            $name = "abc";
            $customer->setAvatar($name);

            if ($this->customerResourceModel->save($customer)) {
                $this->customerResourceModel->upload($_FILES, 'custommer', $name);
            }
        }
        $this->render('register', false);
    }
}
