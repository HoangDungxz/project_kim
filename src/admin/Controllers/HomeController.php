<?php

namespace ADMIN\Controllers;

/**
 * HomeController
 * 
 * @param ControllerName Trang chủ
 * @param SortOrder 1
 */
class HomeController extends AdminControllers
{
    /**
     * Index
     * 
     * @param MethodName Xem thống kế
     */
    function index()
    {
        $this->render("index");
    }
}
