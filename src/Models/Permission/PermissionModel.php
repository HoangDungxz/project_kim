<?php

namespace SRC\Models\Permission;

use SRC\Core\Model;

/** 
 * A Order class
 *
 * @param  table permissions
 * @param  id id
 * 
 */
class PermissionModel extends Model
{
    private $id;
    private $name;
    private $paths;


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
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of paths
     */
    public function getPaths()
    {
        return json_decode($this->paths, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Set the value of paths
     *
     * @return  self
     */
    public function setPaths($paths)
    {
        $this->paths = json_decode($paths, JSON_UNESCAPED_UNICODE);
        return $this;
    }
}
