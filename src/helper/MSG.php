<?php

namespace SRC\helper;

class MSG
{
    public static function send($msg, $type = 'error')
    {
        $msgSend = SESSION::pull('msgs');

        $msgSend .= MSG::toastr($msg, $type);

        SESSION::push('msgs', $msgSend);
    }

    private function toastr($msg, $type)
    {
        return '<script type="text/javascript"> toastr.' . $type . '("' . htmlspecialchars($msg) . '","' . strtoupper($type) . '"); </script>';
    }
}
