<?php

namespace ADMIN\Controllers;

use SRC\Core\Controller;

class HomeController extends AdminControllers
{
    function index()
    {

        $this->render("index");
    }
}
