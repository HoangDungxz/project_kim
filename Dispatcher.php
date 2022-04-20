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

        $response =  call_user_func_array([$controller, $this->request->action], [$params]);

        if ($response) {
            return new $controller;
        } else {
            $this->request->action = 'notFound';
            $this->request->params = [];
            return new $controller;
        }
    }

    public function loadController()
    {
        if ($this->request->page != 'admin') {
            $prefix = 'SRC\Controllers\\';
        } else {
            $prefix = 'ADMIN\Controllers\\';
        }

        $controller = $prefix . ucfirst($this->request->controller) . 'Controller';

        if (class_exists($controller) && method_exists($controller, $this->request->action)) {
            return new $controller;
        } else {
            $this->request->action = 'notFound';
            $this->request->params = [];
            $controller = $prefix . "HomeController";
            return new $controller;
        }
    }
}
