<?php

namespace ADMIN\Controllers;

/**
 * HomeController
 * 
 * @param ControllerName Quản lý đại lý
 * @param SortOrder 7
 * @param Icon fas fa-comments-dollar
 */
class SaleAgentController  extends AdminControllers
{
    /**
     * Index
     * 
     * @param AcctionName Danh sách đại lý
     */
    function index()
    {
        $this->render("index");
    }
}
