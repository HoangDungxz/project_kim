<?php

namespace ADMIN\Controllers;

use SRC\Models\Rating\RatingResourceModel;

/**
 * RatingController
 * 
 * @param ControllerName Quản Rating
 * @param SortOrder 10
 * @param Icon fas fa-star
 */
class RatingController  extends AdminControllers
{

    private $ratingResourceModel;
    function __construct()
    {
        parent::__construct();
        $this->ratingResourceModel = new RatingResourceModel();
    }

    /**
     * Index
     * 
     * @param AcctionName Danh sách Rating
     */
    function index()
    {
        $rating = $this->ratingResourceModel
            ->join('customers', 'customers.id=rating.customer_id')
            ->join('products', 'products.id=rating.product_id')
            ->select('rating.*,customers.name as customers_name,products.name as products_name')
            ->getAll();

        $this->with($rating);
        $this->render("index");
    }
}
