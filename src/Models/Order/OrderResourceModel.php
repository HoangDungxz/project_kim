<?php

namespace SRC\Models\Order;

use SRC\Core\ResourceModel;
use SRC\Models\OrderDetail\OrderDetailResourceModel;

class OrderResourceModel extends ResourceModel
{
    public function save(...$models)
    {
        $orderModel = $models[0];
        $orderDetail = $models[1];


        $oderExist = $this
            ->where("$this->table.customer_id", $orderModel->getCustomer_id())
            ->where("$this->table.status", 0)
            ->get();

        if ($oderExist != false) {
            $orderModel->setId($oderExist->getId())
                ->setPrice(($oderExist->getPrice() + $oderExist->getPrice()))
                ->setDate($oderExist->getDate())
                ->setStatus(0);

            $oderDetailResourceModel = new OrderDetailResourceModel();
            $oderDetailExist = $oderDetailResourceModel->where('order_id', $orderModel->getId())
                ->where('product_id', $orderDetail->getProduct_id())
                ->get();


            if ($oderDetailExist != false) {
                $orderDetail->setId($oderDetailExist->getId())
                    ->setOrder_id($oderDetailExist->getOrder_id())
                    ->setQuantity($oderDetailExist->getQuantity() + $oderDetailExist->getQuantity())
                    ->setPrice($oderDetailExist->getPrice() + $oderDetailExist->getPrice());
            } elseif ($orderModel->getId() != null) {
                $orderDetail->setOrder_id($orderModel->getId());
            }
        }

        return parent::save($orderModel, $orderDetail);
    }
}
