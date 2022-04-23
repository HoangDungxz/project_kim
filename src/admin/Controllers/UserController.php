<?php

namespace ADMIN\Controllers;

/**
 * UserController
 * 
 * @param ControllerName Quản lý tài khoản
 * @param SortOrder 3
 * @param Icon fas fa-user
 */
class UserController extends AdminControllers
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Index
     * 
     * @param AcctionName Danh sách tài khoản
     */
    function index()
    {
        $users = $this->userResoureModel->getAll();


        $this->with($users);

        $this->render("index");
    }

    /**
     * Index
     * 
     * @param AcctionName Thêm mới lý tài khoản
     */
    function create()
    {
        $user = $this->customerResoureceModel->getAll();

        if (isset($_POST['category_name']) && isset($_POST['category_parent'])) {

            if ($this->categoriesResourceModel->save($user)) {
            }
        } else {
            $message = "Tạo mới tài khoản không thành công";
        }
        $this->render("create");
    }

    /**
     * Index
     *
     * @param AcctionName Sửa tài khoản
     */
    function edit()
    {
        $this->render("create");
    }
    function login()
    {
        $this->render("login", false);
    }
    public function logout()
    {
        if ($this->userResoureModel->logout()) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        };
    }
}