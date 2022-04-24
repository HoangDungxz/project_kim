<?php

namespace ADMIN\Controllers;

use SRC\helper\MSG;
use SRC\Models\Brand\BrandResourceModel;
use SRC\Models\Category\CategoryResourceModel;
use SRC\Models\Image\ImageModel;
use SRC\Models\Image\ImageResourceModel;
use SRC\Models\Product\ProductModel;
use SRC\Models\Product\ProductResourceModel;

/**
 * ProductController
 * 
 * @param ControllerName Quản lý sản phẩm
 * @param SortOrder 4
 * @param Icon fas fa-box-open
 */
class ProductController extends AdminControllers
{
    private $productsResourceModel;
    private $imagesResourceModel;
    private $categoryResourceModel;
    private $brandResourceModel;
    public function __construct()
    {
        parent::__construct();
        $this->productsResourceModel = new ProductResourceModel();
        $this->imagesResourceModel = new ImageResourceModel();
        $this->brandResourceModel = new BrandResourceModel();
        $this->categoryResourceModel = new CategoryResourceModel();
    }
    /**
     * Index
     * 
     * @param AcctionName Danh sách sản phẩm
     */
    function index()
    {
        $products = $this->productsResourceModel->getAll();
        $this->with($products);

        $this->render("index");
    }

    /**
     * Index
     * 
     * @param AcctionName Thêm sản phẩm
     */
    function create()
    {

        $products = $this->productsResourceModel->getAll();
        $categories = $this->categoryResourceModel->getALL();
        $brands = $this->brandResourceModel->getAll();
        $this->with($products);
        $this->with($categories);
        $this->with($brands);

        $breadcrumb = "Thêm sản phẩm";
        $this->with($breadcrumb);

        extract($_POST);
        if (isset($name, $description, $content, $hot, $price, $discount, $category_id, $brand_id)) {

            $product = new ProductModel();
            $product->setName($name);
            $product->setDescription($description);
            $product->setContent($content);
            $product->setHot($hot);
            $product->setPrice($price);
            $product->setDiscount($discount);
            $product->setCategory_id($category_id);
            $product->setBrand_id($brand_id);
            $product->send_id_to_child = true;

            $arraysave = [];

            array_push($arraysave, $product);

            extract($_FILES);
            if ($images) {
                $images = $this->reArrayFiles($images);
                foreach ($images as $i) {
                    $image = new ImageModel();
                    $image->setPath($this->productsResourceModel->upload($i));
                    $image->parent_id = 'product_id';

                    if ($image->getPath() != null) {
                        array_push($arraysave, $image);
                    }
                }
            }

            if ($this->productsResourceModel->save(...$arraysave)) {
            }
        }

        $this->render("create");
    }
    private function reArrayFiles(&$file_post)
    {
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }


    /**
     * Index
     * 
     * @param AcctionName Xóa sản phẩm
     */
    function delete($params)
    {
        if (!isset($params['pid'])) {
            echo 'false';
            die;
        }

        $product = $this->productsResourceModel->getById($params['pid']);

        if ($product) {

            $images = $this->imagesResourceModel->where('product_id', $product->getId())->getAll();

            $this->productsResourceModel->delete($product, ...$images);

            if ($this->productsResourceModel->delete($product, ...$images)) {
                foreach ($images as $i) {
                    $this->imagesResourceModel->deleteImage($i->getPath(), 'products');
                }
                echo 'true';
            }
        }
    }
}
