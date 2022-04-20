<?php

namespace SRC\Core;

class Model
{
    protected $table_name;
    protected $table_id;

    function __construct()
    {
        $this->prepareTable();
    }

    public function getProperties()
    {
        $reflection = new \ReflectionClass($this);

        $vars = $reflection->getProperties(\ReflectionProperty::IS_PRIVATE);

        $result = [];

        foreach ($vars as $value) {

            $result[$value->getName()] = $this->get($value->getName());
        }

        return $result;
    }

    public function get($propertie)
    {
        return call_user_func(array($this, "get" . ucfirst($propertie)));
    }
    public function set($propertie)
    {
        return call_user_func(array($this, "set" . ucfirst($propertie)));
    }

    protected function prepareTable()
    {
        $reflection = new \ReflectionClass($this);
        $comment_string = ($reflection->getDocComment());

        if ($comment_string != false) {

            $pattern = "#(@[a-zA-Z]+\s*[a-zA-Z0-9, ()_].*)#";
            preg_match_all($pattern, $comment_string, $matches, PREG_PATTERN_ORDER);

            foreach ($matches[0] as  $value) {
                if (strpos($value, "@param") !== false) {
                    $value = str_replace(["@param", " "], '', $value);
                    $value = preg_replace('/\s+/u', '', $value);

                    if (strpos($value, "table") !== false) {
                        $this->table_name = str_replace('table', '', $value);
                    }

                    if (strpos($value, "id") !== false) {
                        $this->table_id = substr($value, strpos($value, "id") + 2);
                    }
                }
            }
        }
    }

    /**
     * Get the value of table_name
     */
    public function getTable_name()
    {
        return $this->table_name;
    }

    /**
     * Set the value of table_name
     *
     * @return  self
     */
    public function setTable_name($table_name)
    {
        $this->table_name = $table_name;

        return $this;
    }

    /**
     * Get the value of table_id
     */
    public function getTable_id()
    {
        return $this->table_id;
    }

    /**
     * Set the value of table_id
     *
     * @return  self
     */
    public function setTable_id($table_id)
    {
        $this->table_id = $table_id;

        return $this;
    }

    public function unsetPrepareTable()
    {
        unset($this->model->table_name);
        unset($this->model->table_id);
    }
}
