<?php

namespace ADMIN\Controllers;

use SRC\Core\Controller;

class HomeController extends Controller
{
    function index()
    {
        $this->render("index");
    }
}
