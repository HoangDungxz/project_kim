<?php

namespace ADMIN\Controllers;

use SRC\helper\MSG;

/**
 * HomeController
 * 
 * @param ControllerName Trang chủ
 * @param SortOrder 1
 * @param Icon fas fa-columns
 */
class HomeController extends AdminControllers
{
    /**
     * Index
     * 
     * @param AcctionName Xem thống kế
     */
    function index()
    {
        $this->render("index");
    }

    function login()
    {

        $this->render("login", false);
    }

    function notFound()
    {

        $this->render("not_found", false);
    }
}
