<?php

namespace SRC\helper;

class DATE
{
    public static function format($originalDate)
    {

        return date("d-m-Y", strtotime($originalDate));
    }
    public static function format_vn_datetime($originalDate)
    {

        return date("d-m-Y H:i", strtotime($originalDate));
    }
}
