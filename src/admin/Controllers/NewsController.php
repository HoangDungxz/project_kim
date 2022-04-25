<?php

namespace ADMIN\Controllers;

/**
 * HomeController
 * 
 * @param ControllerName Quản lý tin tức
 * @param SortOrder 8
 * @param Icon fas fa-newspaper
 */
class NewsController  extends AdminControllers
{
    /**
     * Index
     * 
     * @param AcctionName Danh sách tin tức
     */
    function index()
    {
        $this->render("index");
    }
}
