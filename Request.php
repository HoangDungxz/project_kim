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
        $params = [];
        $newData = [];
        $this->urlParams = explode('?', $requestUri);
        if (isset($this->urlParams[1])) {
            $check = strpos($this->urlParams[1], '&');
            if ($check > 0) {
                $this->urlParams = explode('&', $this->urlParams[1]);

                for ($i = 0; $i < count($this->urlParams); $i++) {
                    $key = urldecode($this->urlParams[$i]);
                    $newData[] = explode('=', $this->urlParams[$i] ?? '');
                }

                // lấy thày cặp array key value theo dâu =
                foreach ($newData as $key => $values) {
                    for ($i = 0; $i < count($values); $i += 2) {
                        $key = urldecode($values[$i]);
                        $value = urldecode($values[$i + 1]);
                        $params[$key] = $value;
                    }
                }
            } else {

                $this->urlParams = explode('=', $this->urlParams[1] ?? '');

                if (!isset($this->urlParams[1])) {
                    unset($this->urlParams[0]);
                }

                // lấy thày cặp array key value theo dâu =
                for ($i = 0; $i < count($this->urlParams); $i += 2) {
                    $key = urldecode($this->urlParams[$i]);
                    $value = urldecode($this->urlParams[$i + 1]);
                    $params[$key] = $value;
                }
            }
        }

        $this->urlParams = $params;

        $this->url = rtrim($_GET["p"], '#');
    }
}
