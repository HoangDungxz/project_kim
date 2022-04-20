<?php

namespace ADMIN\Controllers;

use SRC\Models\User\UserResourceModel;

/**
 * UserController
 * 
 * @param ControllerName Quản lý tài khoản
 * @param SortOrder 3
 */
class UserController extends AdminControllers
{
    protected $customerResoureceModel;
    public function __construct()
    {
        parent::__construct();
        $this->customerResoureceModel = new UserResourceModel();
    }
    /**
     * Index
     * 
     * @param MethodName Danh sách tài khoản
     */
    function index()
    {
        $users = $this->customerResoureceModel->getAll();

        $this->with($users);

        $this->render("index");
    }

    /**
     * Index
     * 
     * @param MethodName Thêm mới lý tài khoản
     */
    function create()
    {
        $this->render("create");
    }

    /**
     * Index
     * 
     * @param MethodName Sửa tài khoản
     */
    function edit()
    {
        $this->render("create");
    }
}
