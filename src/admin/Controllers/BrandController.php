<?php

namespace ADMIN\Controllers;

use SRC\helper\MSG;
use SRC\Models\Brand\BrandResourceModel;
use SRC\Models\Image\ImageResourceModel;
use SRC\Models\Product\ProductResourceModel;

/**
 * BrandController
 * 
 * @param ControllerName Quản thương hiệu
 * @param SortOrder 3
 * @param Icon fas fa-tape
 */
class BrandController  extends AdminControllers
{

    private $brandResourceModel;
    private $productsResourceModel;
    private $imagesResourceModel;

    function __construct()
    {
        parent::__construct();
        $this->brandResourceModel = new BrandResourceModel();
        $this->productsResourceModel = new ProductResourceModel();

        $this->imagesResourceModel = new ImageResourceModel();
    }

    /**
     * Index
     * 
     * @param AcctionName Danh sách hiệu
     */
    function index()
    {
        $brands = $this->brandResourceModel
            ->join('products', 'products.brand_id=brands.id')
            ->select('brands.*,COUNT(products.id) as product_count')
            ->groupBy('brands.id')
            ->getAll();

        $this->with($brands);
        $this->render("index");
    }


    /**
     * Index
     * 
     * @param AcctionName Xóa thương hiệu
     */
    function delete($params)
    {
        if (isset($params['bid'])) {

            // lấy bảng chính
            $brand = $this->brandResourceModel->getById($params['bid']);

            if ($brand) {


                $listShow = [];

                $showbrand = new \stdClass;
                $showbrand->brand_id = $brand->getId();
                $showbrand->brand_name = $brand->getName();

                $products = $this->productsResourceModel->where('brand_id', $brand->getId())->getAllInclule('id,name');

                if ($products) {
                    $showproducts = [];
                    foreach ($products as $p) {

                        $showproduct = new \stdClass;
                        $showproduct->product_id = $p->getId();
                        $showproduct->product_name = $p->getName();


                        array_push($showproducts, $showproduct);
                    }

                    $showbrand->products = $showproducts;
                }
                array_push($listShow, $showbrand);
            }

            echo json_encode($listShow, JSON_UNESCAPED_UNICODE);
        }
        /////////////////////////////////////

        if (isset($_POST['bid'])) {

            $will_deletes = [];

            // lấy bảng chính
            $brand = $this->brandResourceModel->getById($_POST['bid']);

            if ($brand) {

                // lấy các bảng phụ
                $products = $this->productsResourceModel->where('brand_id', $brand->getId())->getAllInclule('id,name');

                if ($products) {
                    foreach ($products as $p) {
                        $images =  $this->imagesResourceModel->select('id')->where('product_id', $p->getId())->getAll();

                        if ($images) {
                            foreach ($images as $i) {
                                array_push($will_deletes, $i);
                            }
                        }
                        array_push($will_deletes, $p);
                    }
                }
                array_push($will_deletes, $brand);
            }


            if ($this->brandResourceModel->delete(...$will_deletes)) {
                echo 'true';
                MSG::send('Xóa thương hiệu thành công', 'success');
                die;
            } else {
                MSG::send('Xóa thương hiệu thất bại');
                echo 'false';
                die;
            }
        }
        die;
    }
}
