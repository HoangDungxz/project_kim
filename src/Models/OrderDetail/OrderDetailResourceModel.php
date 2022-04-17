<?php

namespace SRC\Models\OrderDetail;

use SRC\Core\ResourceModel;


class OrderDetailResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->_init("orderdetails", "id", new OrderDetailModel());
    }
}
