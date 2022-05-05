<?php

namespace SRC\Models\User;

use SRC\Core\ResourceModel;
use SRC\helper\MSG;
use SRC\helper\SESSION;

class UserResourceModel extends ResourceModel
{

    public function login($user)
    {
        // logout user cũ
        SESSION::get($this->table) == null;

        $userLogIned =  $this->select('users.id,users.email,users.name,users.avatar,users.status')
            ->where('email', $user->getEmail())
            ->where('password', $user->getPassword())
            ->get();

        if ($userLogIned != null) {

            if ($userLogIned->getStatus() == 0) {
                MSG::send("Tài khoản của bạn đã bị khóa", 'warning');
                return false;
            }

            $this->saveSession($userLogIned);

            return true;
        }

        return false;
    }
    public function logout()
    {
        $this->remove();
        if (SESSION::get($this->table) == null) {
            MSG::send("Đăng xuất thành công", 'warning');
            return true;
        }

        return false;
    }

    public function getAll($params = [])
    {
        $this->join('permissions', 'permissions.id=users.permission_id')
            ->select('users.*,permissions.name as permissions_name,permissions.paths as permissions_paths');
        return parent::getAll();
    }
}
