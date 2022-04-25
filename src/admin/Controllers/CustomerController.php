<?php

namespace ADMIN\Controllers;

use SRC\helper\MSG;
use SRC\helper\SESSION;
use SRC\Models\Customer\CustomerResourceModel;

/**
 * HomeController
 * 
 * @param ControllerName Quản lý khách hàng
 * @param SortOrder 6
 * @param Icon fas fa-credit-card
 */
class CustomerController  extends AdminControllers
{
    private $customerResourceModel;
    function __construct()
    {
        parent::__construct();
        $this->customerResourceModel =  new CustomerResourceModel();
    }

    /**
     * Index
     * 
     * @param AcctionName Danh sách khách hàng
     */
    function index()
    {
        $customers = $this->customerResourceModel->getAll();
        $this->with($customers);
        $this->render("index");
    }

    /**
     * Index
     * 
     * @param AcctionName Sửa khách hàng
     */
    function edit($params)
    {
        if (!isset($params['cid'])) {
            header('Location: ' . WEBROOT . "admin/customer");
        }

        $customer = $this->customerResourceModel->getById($params['cid']);
        extract($_POST);

        if (isset($name) && isset($phone) && isset($address) && isset($email)) {

            $avatar = basename($_FILES["avatar"]["name"]);

            $customer->setName($name);
            $customer->setEmail($email);

            $customer->setPhone($phone);
            $customer->setAddress($address);

            if (strpos($password, '*') !== false) {
                $customer->setPassword($password);
            }
            extract($_FILES);

            if ($avatar['name'] != null) {

                $avatar =  $this->customerResourceModel->upload($avatar);
                if ($avatar) {
                    // xóa ảnh cũ
                    if ($customer->getAvatar() != null && $customer->getAvatar() != 'default_customer_image.jpg') {
                        $this->customerResourceModel->deleteImage($customer->getAvatar());
                    }
                    $customer->setAvatar($avatar);
                }
            }

            if ($this->customerResourceModel->save($customer)) {

                // header('Location: ' . WEBROOT . "admin/customer");
                MSG::send("Sửa khách hàng thành công", 'success');
            } else {
                MSG::send("Sửa khách hàng không thành công");
            }
        }

        $this->with($customer);
        $this->render("edit");
    }

    /**
     * Index
     *
     * @param AcctionName Xóa khách hàng
     */
    public function delete($params)
    {

        if (!$params['cid']) {
            MSG::send("không có khách hàng này");
            echo 'false';
            die;
        }

        $customer = $this->customerResourceModel->getById($params['cid']);

        if (!$customer) {
            MSG::send("không có khách hàng này");
            echo 'false';
            die;
        }

        if ($this->customerResourceModel->delete($customer)) {

            if ($customer->getAvatar() != null && $customer->getAvatar() != 'default_customer_image.jpg') {
                $this->customerResourceModel->deleteImage($customer->getAvatar());
            }

            if ($params['cid'] == SESSION::get('customers', 'id')) {
                $this->customerResoureModel->logout();
            }
            MSG::send("Xóa khách hàng " . $customer->getName() . " thành công", 'success');
            echo 'true';
            die;
        }
    }
}
