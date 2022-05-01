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
}
