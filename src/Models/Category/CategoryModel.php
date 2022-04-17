<?php

namespace SRC\Models\Category;

use SRC\Core\Model;

/** 
 * A Category class
 *
 * @param  table categories
 * @param  id id
 * 
 */
class CategoryModel extends Model
{
    private $id;
    private $name;
    private $displayhomepage;
    private $parent_id;

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
     * Get the value of displayhomepage
     */
    public function getDisplayhomepage()
    {
        return $this->displayhomepage;
    }

    /**
     * Set the value of displayhomepage
     *
     * @return  self
     */
    public function setDisplayhomepage($displayhomepage)
    {
        $this->displayhomepage = $displayhomepage;

        return $this;
    }

    /**
     * Get the value of parent_id
     */
    public function getParent_id()
    {
        return $this->parent_id;
    }

    /**
     * Set the value of parent_id
     *
     * @return  self
     */
    public function setParent_id($parent_id)
    {
        $this->parent_id = $parent_id;

        return $this;
    }
}
