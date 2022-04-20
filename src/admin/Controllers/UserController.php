<?php

namespace ADMIN\Controllers;

use SRC\Models\User\UserResourceModel;

/**
 * UserController
 * 
 * @param ControllerName Quản lý tài khoản
 * @param SortOrder 3
 * @param Icon fas fa-user
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
     * @param AcctionName Danh sách tài khoản
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
     * @param AcctionName Thêm mới lý tài khoản
     */
    function create()
    {
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
}
