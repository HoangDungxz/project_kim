<?php

namespace SRC\Models\Order;

use SRC\Core\ResourceModel;
use SRC\Models\OrderDetail\OrderDetailResourceModel;

class OrderResourceModel extends ResourceModel
{
    public function save(...$models)
    {
        $orderModel = $models[0];


        // kiêm tra lại status xem được mua chưa
        $oderExist = $this
            ->where("$this->table.customer_id", $orderModel->getCustomer_id())
            ->where("$this->table.status", $orderModel->getStatus() ?? 0)
            ->get();

        if ($oderExist != false) {
            $orderModel->setId($oderExist->getId())
                ->setDate($oderExist->getDate())
                ->setStatus(0);


            if (isset($models[1])) {

                $orderDetail = $models[1];

                $oderDetailResourceModel = new OrderDetailResourceModel();
                $oderDetailExist = $oderDetailResourceModel->where('order_id', $orderModel->getId())
                    ->where('product_id', $orderDetail->getProduct_id())
                    ->get();


                if ($oderDetailExist != false) {
                    $orderDetail->setId($oderDetailExist->getId())
                        ->setOrder_id($oderDetailExist->getOrder_id())
                        ->setQuantity($oderDetailExist->getQuantity() + $orderDetail->getQuantity())
                        ->setPrice($oderDetailExist->getPrice() + $orderDetail->getPrice());
                } elseif ($orderModel->getId() != null) {
                    $orderDetail->setOrder_id($orderModel->getId());
                }
            }
        }

        return parent::save($orderModel, $orderDetail);
    }

    public function change_status($orderModel)
    {
        return parent::save($orderModel);
    }

    public function checkout($order)
    {
        $order->setStatus(1);
        parent::save($order);
        $this->remove('orders');
        return true;
    }
}
