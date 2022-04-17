<?php

namespace SRC\Models\Order;

use SRC\Core\ResourceModel;


class OrderResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->_init("orders", "id", new OrderModel());
    }
}
