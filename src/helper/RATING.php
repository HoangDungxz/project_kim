<?php

namespace SRC\helper;

class RATING
{
    public static function toStar($starNum)
    {
        $display = '';
        for ($i = 0; $i < 5; $i++) {
            if ($i < $starNum) {
                $display .= '<i class="fa fa-star color"></i>';
            } else {
                $display .= '<i class="fa fa-star"></i>';
            }
        }
        return $display;
    }
}
