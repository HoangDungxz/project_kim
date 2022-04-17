<?php

namespace SRC\Models\OrderDetail;

use SRC\Core\ResourceModel;
use SRC\Models\Image\ImageResourceModel;

class OrderDetailResourceModel extends ResourceModel
{

    protected $imageResoureModel;
    public function __construct()
    {
        parent::__construct();
        $this->imageResoureModel = new ImageResourceModel();
    }
    public function getFrontendOrderView()
    {
        $carts = parent::getAll();

        foreach ($carts as $key => $c) {
            $carts[$key]->setProduct_images($this->includeImage($c->getProduct_product_id()));
        }
        return  $carts;
    }
}
