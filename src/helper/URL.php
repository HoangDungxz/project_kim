<?php

namespace SRC\helper;

class URL
{
    public static  function  base64_encode_url($string)
    {
        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($string));
    }

    public static  function base64_decode_url($string)
    {
        return base64_decode(str_replace(['-', '_'], ['+', '/'], $string));
    }
}
