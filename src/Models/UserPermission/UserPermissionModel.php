<?php

namespace SRC\Models\UserPermission;

use SRC\Core\Model;

/** 
 * A Order class
 *
 * @param  table user_permissions
 * @param  id id
 * 
 */
class UserPermissionModel extends Model
{
    private $id;
    private $user_id;
    private $permission_id;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of user_id
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of permission_id
     */
    public function getPermission_id()
    {
        return $this->permission_id;
    }

    /**
     * Set the value of permission_id
     *
     * @return  self
     */
    public function setPermission_id($permission_id)
    {
        $this->permission_id = $permission_id;

        return $this;
    }
}
