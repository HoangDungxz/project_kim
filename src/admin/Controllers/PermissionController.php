<?php

namespace ADMIN\Controllers;

use SRC\helper\MSG;
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
     * @param AcctionName Thêm quyền
     */
    function create()
    {
        extract($_POST);

        if (isset($permission_name)) {
            $permission = new PermissionModel();
            $permission->setName($permission_name);
            $permission->setPaths('[]');
            if ($this->permissionResourceModel->save($permission)) {

                MSG::send('Thêm mới quyền thành công', 'success');
                $this->index([]);
            }
        }
        $this->render("create");
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

            MSG::send('Cập nhật quyền thành công', 'success');

            $this->index(['pid' => $pid]);
        } else {
            MSG::send('Cập nhật quyên lỗi vui lòng kiểm tra lại');
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

            if ($this->permissionResourceModel->delete($permission)) {
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
