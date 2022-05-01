<?php

namespace SRC\helper;

class DATE
{
    public static function format($originalDate)
    {
        $originalDate = "2010-03-21";
        return date("d-m-Y", strtotime($originalDate));
    }
}
