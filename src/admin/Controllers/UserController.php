<?php

namespace ADMIN\Controllers;

use DateTime;
use DateTimeZone;
use SplFileInfo;
use SRC\helper\ERROR;
use SRC\helper\MSG;
use SRC\helper\SESSION;
use SRC\Models\Permission\PermissionResourceModel;
use SRC\Models\User\UserModel;
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
    private $userResourceModel;
    private $permissionResourceModel;
    public function __construct()
    {
        parent::__construct();
        $this->userResourceModel = new UserResourceModel();
        $this->permissionResourceModel = new PermissionResourceModel;
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

        $permissions =  $this->permissionResourceModel->getAll();
        $this->with($permissions);

        extract($_POST);

        if (isset($name) && isset($phone) && isset($address) && isset($email) && isset($permission)) {

            $avatar = basename($_FILES["avatar"]["name"]);

            $user = new UserModel();

            $user->setName($name);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setPhone($phone);
            $user->setAddress($address);
            $user->setStatus($status);
            $user->setPermission_id($permission);

            extract($_FILES);

            if ($avatar['name'] != null) {
                $avatar =  $this->userResourceModel->upload($avatar);
            } else {
                $avatar = 'user-default-avatar.png';
            }

            $user->setAvatar($avatar);

            // kiểm tra chống trùng email
            $checkEmailUnique = $this->userResourceModel->select('id')->where('email', $email)->get();


            if ($checkEmailUnique) {
                MSG::send('Email đã được đăng ký trước đó');
                $this->with($user);
                goto end;
            }

            if ($this->userResourceModel->save($user)) {

                header('Location: ' . WEBROOT . "admin/user");
            } else {
                MSG::send("Tạo mới tài khoản không thành công");
            }
        }

        end:
        $breadcrumb = "Tạo mới tài khoản";
        $this->with($breadcrumb);
        $this->render("create");
    }

    /**
     * Index
     *
     * @param AcctionName Sửa tài khoản
     */
    function edit($params)
    {
        if (!isset($params['uid'])) {
            header('Location: ' . WEBROOT . "admin/user");
        }

        $permissions =  $this->permissionResourceModel->getAll();
        $this->with($permissions);

        $user =  $this->userResourceModel->getById($params['uid']);


        extract($_POST);

        if (isset($name) && isset($phone) && isset($address) && isset($email) && isset($permission)) {

            $avatar = basename($_FILES["avatar"]["name"]);

            $user->setName($name);
            $user->setEmail($email);

            $user->setPhone($phone);
            $user->setAddress($address);
            $user->setStatus($status ?? 0);
            $user->setPermission_id($permission);

            if (strpos($password, '*') !== false) {
                $user->setPassword($password);
            }
            extract($_FILES);


            if ($avatar['name'] != null) {

                $avatar =  $this->userResourceModel->upload($avatar);
                if ($avatar) {
                    // xóa ảnh cũ
                    if ($user->getAvatar() != null && $user->getAvatar() != 'user-default-avatar.png') {
                        $this->userResourceModel->deleteImage($user->getAvatar());
                    }
                    $user->setAvatar($avatar);
                }
            }

            if ($this->userResourceModel->save($user)) {

                // header('Location: ' . WEBROOT . "admin/user");
                MSG::send("Sửa tài khoản thành công", 'success');
            } else {
                MSG::send("Sửa tài khoản không thành công");
            }
            header("Refresh:0");
            exit(); //optional
        }
        $breadcrumb = "Sửa tài khoản";
        $this->with($breadcrumb);
        $this->with($user);
        $this->render("create");
    }

    function login()
    {
        $this->render("login", false);
    }

    public function logout()
    {
        if ($this->userResoureModel->logout()) {
            MSG::send("Đăng xuất thành công", 'success');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit(); //optional
        };
    }


    /**
     * Index
     *
     * @param AcctionName Xóa tài khoản
     */
    public function delete($params)
    {

        if (!$params['uid']) {
            MSG::send("không có tài khoản này");
            echo 'false';
            die;
        }

        $user = $this->userResourceModel->getById($params['uid']);

        if (!$user) {
            MSG::send("không có tài khoản này");
            echo 'false';
            die;
        }

        if ($this->userResourceModel->delete($user)) {

            if ($user->getAvatar() != null && $user->getAvatar() != 'user-default-avatar.png') {
                $this->userResourceModel->deleteImage($user->getAvatar());
            }

            if ($params['uid'] == SESSION::get('users', 'id')) {
                $this->userResoureModel->logout();
            }
            MSG::send("xóa tài khoản " . $user->getName() . " thành công", 'success');
            echo 'true';
            die;
        }
    }
}
