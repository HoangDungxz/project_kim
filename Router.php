<?php

namespace MVC;

use SRC\helper\SESSION;

class Router
{
    static public function parse($url, $request)
    {
        $url = trim($url);
        $url = rtrim($url, "/");

        $explode_url = explode('/', $url);
        if ($explode_url[0] == 'admin') {
            $request->page = 'admin';
            unset($explode_url[0]);
            $explode_url = array_values($explode_url);
        } else {
            $request->page = 'customer';
        }

        switch ($explode_url[0] ?? '') {
            case "":
                $request->controller = "Home";
                $request->action = "index";
                $request->params = [];
                break;
            default:
                switch ($explode_url[1] ?? "") {
                    case "":
                        $request->controller = $explode_url[0];
                        $request->action = "index";
                        $request->params = [];
                        break;
                    default:
                        $request->controller = $explode_url[0];
                        $request->action = $explode_url[1];
                        $request->params = array_slice($explode_url, 2);
                        break;
                }
                break;
        }


        // lưu lên sesion
        SESSION::push('request',  $request->controller, 'controller');
        SESSION::push('request',  $request->action, 'action');
    }
}
