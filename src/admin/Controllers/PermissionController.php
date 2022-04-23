<?php

namespace ADMIN\Controllers;

use SRC\Models\Permission\PermissionModel;
use SRC\Models\Permission\PermissionResourceModel;
use SRC\Models\UserPermission\UserPermissionResourceModel;

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
    private $userPermissionResourceModel;
    public function __construct()
    {
        parent::__construct();
        $this->permissionResourceModel = new PermissionResourceModel();
        $this->userPermissionResourceModel = new UserPermissionResourceModel();
    }

    /**
     * Index
     * 
     * @param AcctionName Xem quyền
     */
    function index($params)
    {
        // lấy id category hoặc id nhỏ nhất bảng category
        if (isset($params['pid'])) {
            $pid = $params['pid'];
        } else {
            $pid = $this->permissionResourceModel->select('MIN(permissions.id) as permissions_min_id')
                ->get()->permissions_min_id;
        }

        $permission = $this->permissionResourceModel->getById($pid);
        $this->with($permission);

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
        extract($_POST);
        $permission = $this->permissionResourceModel->getById($pid);
        $permission->setId($pid);
        $permission->setPathsJson($permission_select ?? []);

        $this->permissionResourceModel->save($permission);

        if ($this->permissionResourceModel->save($permission)) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            $messager = "Phân quyên lỗi vui lòng kiểm tra lại";
            $this->with($messager);
            $this->index(['pid' => $pid]);
        }
    }
    /**
     * Index
     * 
     * @param AcctionName Xóa phân quyền
     */
    function delete($params)
    {
        if ($params['pid']) {

            if ($params['pid'] == $this->permissionResourceModel->select('min(id) as min_id')->get()->min_id) {
                echo 'admin';
                die;
            }

            // lấy bảng chính
            $permission = $this->permissionResourceModel->getById($params['pid']);
            // lấy các bảng phụ
            $user_permissions = $this->userPermissionResourceModel->where('permission_id', $params['pid'])->getAll();

            //chuyển bảng chính ra sau cùng các bảng phụ
            // để xóa sau cùng
            array_push($user_permissions, $permission);

            if ($this->permissionResourceModel->delete(...$user_permissions)) {
                echo 'true';
                die;
            } else {
                echo 'false';
                die;
            }
        }
        echo 'false';
        die;
    }
}
