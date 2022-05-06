<?php

namespace SRC\Controllers;

use SRC\Models\News\NewsResourceModel;
use SRC\Models\Product\ProductResourceModel;


class NewsController extends FrontendControllers
{
    private $newsResourceModel;
    function __construct()
    {
        parent::__construct();
        $this->newsResourceModel = new NewsResourceModel();
    }

    function index()
    {
        $news = $this->newsResourceModel->getAll();

        $this->with($news);
        $this->render("index");
    }
}
