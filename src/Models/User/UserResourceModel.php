<?php

namespace SRC\Models\User;

use SRC\Core\ResourceModel;
use SRC\helper\SESSION;

class UserResourceModel extends ResourceModel
{

    public function login($user)
    {
        $userLogIned =  $this->select('users.id,users.email,users.name,users.avatar,users.status')
            ->where('email', $user->getEmail())
            ->where('password', $user->getPassword(), "OR")
            ->get();

        if ($userLogIned != null) {

            if ($userLogIned->getStatus() == 0) {
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
            return true;
        }
        return false;
    }
}
