<?php

namespace SRC\Models\Customer;

use SRC\Core\ResourceModel;

class CustomerResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->_init("customers", "id", new CustomerModel());
    }

    public function login($customer)
    {

        $customerLoginCheck = [
            'email' => $customer->getEmail(),
            'password' => md5($customer->getPassword())
        ];

        $this->where('email', $customer->getEmail())
            ->where('password', md5($customer->getPassword()))
            ->select("name,email,address,phone,id");

        $customerLogined = parent::get();

        if (($customerLogined) != null) {
            $this->saveSession($customerLogined);
            return true;
        }
        return false;
    }
}
