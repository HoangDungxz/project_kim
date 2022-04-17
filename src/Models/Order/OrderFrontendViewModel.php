<?php

namespace SRC\Models\Order;

use SRC\Core\Model;

class OrderFrontendViewModel extends Model
{
    private $product_id;
    private $product_product_id;
    private $product_price;
    private $product_name;
    private $product_description;
    private $product_content;
    private $product_hot;
    private $product_discount;
    private $product_category_id;
    private $product_brand_id;
    private $product_images;

    private $orderdetail_id;
    private $orderdetail_order_id;
    private $orderdetail_product_id;
    private $orderdetail_quantity;
    private $orderdetail_price;


    /**
     * Get the value of product_id
     */
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }


    /**
     * Get the value of product_product_id
     */
    public function getProduct_product_id()
    {
        return $this->product_product_id;
    }

    /**
     * Set the value of product_product_id
     *
     * @return  self
     */
    public function setProduct_product_id($product_product_id)
    {
        $this->product_product_id = $product_product_id;

        return $this;
    }


    /**
     * Get the value of product_price
     */
    public function getProduct_price()
    {
        return $this->product_price;
    }

    /**
     * Set the value of product_price
     *
     * @return  self
     */
    public function setProduct_price($product_price)
    {
        $this->product_price = $product_price;

        return $this;
    }

    /**
     * Get the value of product_name
     */
    public function getProduct_name()
    {
        return $this->product_name;
    }

    /**
     * Set the value of product_name
     *
     * @return  self
     */
    public function setProduct_name($product_name)
    {
        $this->product_name = $product_name;

        return $this;
    }

    /**
     * Get the value of product_description
     */
    public function getProduct_description()
    {
        return $this->product_description;
    }

    /**
     * Set the value of product_description
     *
     * @return  self
     */
    public function setProduct_description($product_description)
    {
        $this->product_description = $product_description;

        return $this;
    }

    /**
     * Get the value of product_content
     */
    public function getProduct_content()
    {
        return $this->product_content;
    }

    /**
     * Set the value of product_content
     *
     * @return  self
     */
    public function setProduct_content($product_content)
    {
        $this->product_content = $product_content;

        return $this;
    }

    /**
     * Get the value of product_hot
     */
    public function getProduct_hot()
    {
        return $this->product_hot;
    }

    /**
     * Set the value of product_hot
     *
     * @return  self
     */
    public function setProduct_hot($product_hot)
    {
        $this->product_hot = $product_hot;

        return $this;
    }

    /**
     * Get the value of product_discount
     */
    public function getProduct_discount()
    {
        return $this->product_discount;
    }

    /**
     * Set the value of product_discount
     *
     * @return  self
     */
    public function setProduct_discount($product_discount)
    {
        $this->product_discount = $product_discount;

        return $this;
    }

    /**
     * Get the value of product_category_id
     */
    public function getProduct_category_id()
    {
        return $this->product_category_id;
    }

    /**
     * Set the value of product_category_id
     *
     * @return  self
     */
    public function setProduct_category_id($product_category_id)
    {
        $this->product_category_id = $product_category_id;

        return $this;
    }

    /**
     * Get the value of product_brand_id
     */
    public function getProduct_brand_id()
    {
        return $this->product_brand_id;
    }

    /**
     * Set the value of product_brand_id
     *
     * @return  self
     */
    public function setProduct_brand_id($product_brand_id)
    {
        $this->product_brand_id = $product_brand_id;

        return $this;
    }

    /**
     * Get the value of orderdetail_id
     */
    public function getOrderdetail_id()
    {
        return $this->orderdetail_id;
    }

    /**
     * Set the value of orderdetail_id
     *
     * @return  self
     */
    public function setOrderdetail_id($orderdetail_id)
    {
        $this->orderdetail_id = $orderdetail_id;

        return $this;
    }

    /**
     * Get the value of orderdetail_order_id
     */
    public function getOrderdetail_order_id()
    {
        return $this->orderdetail_order_id;
    }

    /**
     * Set the value of orderdetail_order_id
     *
     * @return  self
     */
    public function setOrderdetail_order_id($orderdetail_order_id)
    {
        $this->orderdetail_order_id = $orderdetail_order_id;

        return $this;
    }

    /**
     * Get the value of orderdetail_product_id
     */
    public function getOrderdetail_product_id()
    {
        return $this->orderdetail_product_id;
    }

    /**
     * Set the value of orderdetail_product_id
     *
     * @return  self
     */
    public function setOrderdetail_product_id($orderdetail_product_id)
    {
        $this->orderdetail_product_id = $orderdetail_product_id;

        return $this;
    }

    /**
     * Get the value of orderdetail_quantity
     */
    public function getOrderdetail_quantity()
    {
        return $this->orderdetail_quantity;
    }

    /**
     * Set the value of orderdetail_quantity
     *
     * @return  self
     */
    public function setOrderdetail_quantity($orderdetail_quantity)
    {
        $this->orderdetail_quantity = $orderdetail_quantity;

        return $this;
    }

    /**
     * Get the value of orderdetail_price
     */
    public function getOrderdetail_price()
    {
        return $this->orderdetail_price;
    }

    /**
     * Set the value of orderdetail_price
     *
     * @return  self
     */
    public function setOrderdetail_price($orderdetail_price)
    {
        $this->orderdetail_price = $orderdetail_price;

        return $this;
    }

    /**
     * Get the value of product_images
     */
    public function getProduct_images()
    {
        return $this->product_images;
    }

    /**
     * Set the value of product_images
     *
     * @return  self
     */
    public function setProduct_images($product_images)
    {
        $this->product_images = $product_images;

        return $this;
    }
}
