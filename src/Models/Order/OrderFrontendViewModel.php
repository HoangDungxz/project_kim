<?php

namespace SRC\Models\Order;

use SRC\Core\Model;

class OrderFrontendViewModel extends Model
{
    private $product_id;
    private $product_price;
    private $product_name;
    private $product_hot;
    private $product_discount;
    private $product_images;

    private $orderdetail_id;
    private $orderdetail_order_id;
    private $orderdetail_quantity;
    private $orderdetail_price;


    public function getPriceAffterDiscount()
    {
        return ($this->get('product_price') - $this->get('product_price') * ($this->get('product_discount')) / 100);
    }

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
}
