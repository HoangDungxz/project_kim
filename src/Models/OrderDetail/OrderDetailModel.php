<?php

namespace SRC\Models\OrderDetail;

use SRC\Core\Model;

/** 
 * A OrderDetai class
 *
 * @param  table orderdetails
 * @param  id id
 * 
 */
class OrderDetailModel extends Model
{
    private $id;
    private $order_id;
    private $product_id;
    private $price;
    private $quantity;
    private $agent_id;



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of order_id
     */
    public function getOrder_id()
    {
        return $this->order_id;
    }

    /**
     * Set the value of order_id
     *
     * @return  self
     */
    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;

        return $this;
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
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of agent_id
     */
    public function getAgent_id()
    {
        return $this->agent_id;
    }

    /**
     * Set the value of agent_id
     *
     * @return  self
     */
    public function setAgent_id($agent_id)
    {
        $this->agent_id = $agent_id;

        return $this;
    }
}
