<?php

namespace ADMIN\Controllers;

use SRC\Models\Permission\PermissionModel;
use SRC\Models\Permission\PermissionResourceModel;

/**
 * HomeController
 * 
 * @param ControllerName Quản lý phân quyền
 * @param SortOrder 5
 * @param Icon fas fa-user-lock
 */
class PermissionController extends AdminControllers
{

    private $permissionResourceModel;

    public function __construct()
    {
        parent::__construct();
        $this->permissionResourceModel = new PermissionResourceModel();
    }

    /**
     * Index
     * 
     * @param AcctionName Xem quyền
     */
    function index()
    {

        $permissions = $this->permissionResourceModel->getAll();

        $this->with($permissions);

        $this->render("index");
    }

    /**
     * Index
     * 
     * @param AcctionName Sửa phân quyền
     */
    function update()
    {

        $permissions = $this->permissionResourceModel->getAll();

        $this->with($permissions);

        $this->render("index");
    }
}
