<?php

namespace MVC;

use MVC\Request;
use MVC\Router;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();

        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();

        // lấy prams theo các cặp key value
        $params = [];
        for ($i = 0; $i < count($this->request->params); $i += 2) {
            $key = urldecode($this->request->params[$i]);
            $value = urldecode($this->request->params[$i + 1]);
            $params[$key] = $value;
        }

        // ghép cách truyền thống và cách key value
        $params = array_merge($params, $this->request->urlParams);

        call_user_func_array([$controller, $this->request->action], [$params]);
    }

    public function loadController()
    {
        if ($this->request->page != 'admin') {
            $controller = 'SRC\Controllers\\' . ucfirst($this->request->controller) . 'Controller';
        } else {
            $controller = 'ADMIN\Controllers\\' . ucfirst($this->request->controller) . 'Controller';
        }
        return new $controller();
    }
}
