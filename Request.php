<?php

namespace MVC;

class Request
{
    public $url;
    public $urlParams;
    public function __construct()
    {

        // lấy params theo cách truyền thống
        $requestUri = $_SERVER["REQUEST_URI"];
        $this->urlParams = [];
        $this->urlParams = explode('?', $requestUri);
        $this->urlParams = explode('=', $this->urlParams[1] ?? '');
        if (!isset($this->urlParams[1])) {
            unset($this->urlParams[0]);
        }
        // lấy thày cặp array key value theo dâu =
        $params = [];

        for ($i = 0; $i < count($this->urlParams); $i += 2) {
            $key = urldecode($this->urlParams[$i]);
            $value = urldecode($this->urlParams[$i + 1]);
            $params[$key] = $value;
        }
        $this->urlParams = $params;

        $this->url = $_GET["p"];
    }
}
