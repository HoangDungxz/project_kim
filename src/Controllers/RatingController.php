<?php

namespace SRC\Controllers;

use SRC\helper\MSG;
use SRC\helper\SESSION;
use SRC\Models\Rating\RatingModel;
use SRC\Models\Rating\RatingResourceModel;

class RatingController extends FrontendControllers
{

    private $ratingResourceModel;

    public function __construct()
    {
        parent::__construct();
        $this->ratingResourceModel = new RatingResourceModel();
    }

    function create()
    {
        extract($_POST);

        if ($star) {
            $ratiing = new RatingModel();
            $ratiing->setStar($star);
            $ratiing->setComment($comment);
            $ratiing->setCustomer_id(SESSION::get('customers', 'id'));
            $ratiing->setProduct_id($product_id);

            if ($this->ratingResourceModel->save($ratiing)) {
                MSG::send('Bạn đánh giá sản phẩm thành công', 'success');
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                die;
            }
        }
    }
}
