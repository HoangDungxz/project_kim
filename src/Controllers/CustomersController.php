<?php

namespace SRC\Controllers;

use SRC\helper\MSG;
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

        if (isset($_POST['login_email']) && isset($_POST['login_pass'])) {
            $customer =  new CustomerModel();

            $customer->setEmail($_POST['login_email']);
            $customer->setPassword($_POST['login_pass']);

            $login = $this->customerResourceModel->login($customer);

            if ($login == true) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                $message  = '';
                MSG::send('Địa chỉ email hoặc mật khẩu của bạn không chính xác. Vui lòng thử lại. Nếu bạn quên chi tiết đăng nhập của mình, chỉ cần nhấp vào liên kết `Quên mật khẩu?` đường dẫn phía dưới.');
                die;
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

        if (isset($register_name, $register_phone, $register_email, $register_pass, $register_address)) {
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

                $this->customerResourceModel->loginAfterRegister($customer);
                header('Location: ' . WEBROOT);
            }
        }
        $this->render('register', false);
    }
}
