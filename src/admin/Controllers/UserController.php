<?php

namespace ADMIN\Controllers;

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
    public function __construct()
    {
        parent::__construct();
        $this->userResourceModel = new UserResourceModel();
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
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $uploadFolder = "assets/upload/users/";
            $avatar = basename($_FILES["avatar"]["name"]);

            $user = new UserModel();
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $user->setPhone($_POST['phone']);
            $user->setAddress($_POST['address']);
            $user->setStatus($_POST['status']);
            $user->setAvatar($avatar);

            if ($this->userResoureModel->save($user)) {
                $this->userResourceModel->upload($uploadFolder, $avatar);
                header('Location: ' . WEBROOT . "admin/user");
            }
        } else {
            $message = "Tạo mới tài khoản không thành công";
        }
        // $this->render("create");
    }

    /**
     * Index
     *
     * @param AcctionName Sửa tài khoản
     */
    function edit()
    {
        if (isset($_POST["id"]) && isset($_POST["email"]) && isset($_POST["password"])) {
            $uploadFolder = "assets/upload/users/";
            $avatar = basename($_FILES["avatar"]["name"]);
            $user = $this->userResourceModel->getById($_POST["id"]);

            if ($user) {

                $user->setName($_POST['name']);
                $user->setEmail($_POST['email']);
                $user->setPassword($_POST['password']);
                $user->setPhone($_POST['phone']);
                $user->setAddress($_POST['address']);
                $user->setStatus($_POST['status']);
                $user->setAvatar($avatar);

                if ($this->categoriesResourceModel->save($user)) {

                    $this->userResourceModel->upload($uploadFolder, $avatar);
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }
        } else {
            $message = "Cập nhật tài khoản không thành công";
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
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