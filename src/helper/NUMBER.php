<?php

namespace SRC\helper;

class NUMBER
{
    public static function phone($phone)
    {
        $newstr = substr_replace($phone, ' ', -3, 0);
        $newstr = substr_replace($newstr, ' ', -8, 0);

        return $newstr;
    }
}
