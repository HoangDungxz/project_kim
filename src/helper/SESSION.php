<?php

namespace SRC\helper;

class SESSION
{
    public static function get($table, $column = null)
    {
        if (isset($_SESSION[$table])) {
            if ($column == null) {
                return $_SESSION[$table];
            } else {
                return call_user_func(array($_SESSION[$table], "get" . ucfirst($column)));
            }
        }
        return null;
    }

    public static function set($table, $column = null, $value = null)
    {
        if (isset($_SESSION[$table])) {
            return call_user_func(array($_SESSION[$table], "set" . ucfirst($column)), $value);
        }
        return null;
    }
}
