<?php

namespace ADMIN\Controllers;

use SRC\helper\MSG;
use SRC\Models\News\NewsModel;
use SRC\Models\News\NewsResourceModel;

/**
 * NewsController
 * 
 * @param ControllerName Quản lý tin tức
 * @param SortOrder 9
 * @param Icon fas fa-newspaper
 */
class NewsController  extends AdminControllers
{

    private $newsResourceModel;
    function __construct()
    {
        parent::__construct();
        $this->newsResourceModel = new NewsResourceModel();
    }

    /**
     * Index
     * 
     * @param AcctionName Danh sách tin tức
     */
    function index()
    {
        $news = $this->newsResourceModel->getAll();
        $this->with($news);
        $this->render("index");
    }

    /**
     * Index
     *
     * @param AcctionName Xóa tin tức
     */
    public function delete($params)
    {

        if (!$params['nid']) {
            MSG::send("không có tin tức này");
            echo 'false';
            die;
        }

        $news = $this->newsResourceModel->getById($params['nid']);

        if (!$news) {
            MSG::send("không có tin tức này");
            echo 'false';
            die;
        }

        if ($this->newsResourceModel->delete($news)) {

            if ($news->getPhoto() != null && $news->getPhoto() != '') {
                $this->newsResourceModel->deleteImage($news->getPhoto());
            }

            MSG::send("xóa tin tức " . $news->getName() . " thành công", 'success');
            echo 'true';
            die;
        }
    }

    /**
     * Index
     * 
     * @param AcctionName Thêm mới tin tức
     */
    function create()
    {

        extract($_POST);

        if (isset($name) && isset($description) && isset($content)) {

            $photo = basename($_FILES["photo"]["name"]);

            $news = new NewsModel();

            $news->setName($name);
            $news->setDescription($description);
            $news->setContent($content);
            $news->setHot($hot ?? 0);

            extract($_FILES);

            if ($photo['name'] != null) {
                $photo =  $this->newsResourceModel->upload($photo);
            } else {
                $photo = 'news-default-photo.png';
            }

            $news->setPhoto($photo);


            if ($this->newsResourceModel->save($news)) {
                MSG::send("Tạo mới thành công", 'success');
                header('Location: ' . WEBROOT . "admin/news");
                die;
            } else {
                MSG::send("Tạo mới tin tức không thành công");
            }
        }

        $breadcrumb = "Tạo mới tin tức";
        $this->with($breadcrumb);
        $this->render("create");
    }


    /**
     * Index
     * 
     * @param AcctionName Sửa tin tức
     */
    function edit($params)
    {
        if (!isset($params['nid'])) {
            header('Location: ' . WEBROOT . "admin/news");
        }

        $news = $this->newsResourceModel->getById($params['nid']);
        extract($_POST);

        if (isset($name) && isset($description) && isset($content)) {

            $photo = basename($_FILES["photo"]["name"]);

            $news->setName($name);
            $news->setDescription($description);
            $news->setContent($content);
            $news->setHot($hot ?? 0);

            extract($_FILES);

            if ($photo['name'] != null) {

                $photo =  $this->newsResourceModel->upload($photo);
                if ($photo) {
                    // xóa ảnh cũ
                    if ($news->getPhoto() != null && $news->getPhoto() != 'news_default_image.png') {
                        $this->newsResourceModel->deleteImage($news->getPhoto());
                    }
                    $news->setPhoto($photo);
                }
            }

            if ($this->newsResourceModel->save($news)) {
                MSG::send("Sửa thành công", 'success');
                header("Refresh:0");
                die;
            } else {
                MSG::send("Sửa tin tức không thành công");
            }
        }

        $breadcrumb = "Sửa tin tức";
        $this->with($breadcrumb);
        $this->with($news);
        $this->render("create");
    }
}
