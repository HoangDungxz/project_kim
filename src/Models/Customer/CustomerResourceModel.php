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
        $this->runCreateExtraSql = false;

        $this->extralSql = "WHERE email=:email AND password=:password LIMIT 1";
        $this->select = 'id, email, name';

        $this->selectParams = [
            'email' => $customer->getEmail(),
            'password' => md5($customer->getPassword())
        ];

        $customerLogin = $this->getAll($customer);

        if (count($customerLogin) > 0) {
            $this->saveSession($customerLogin[0]);
            return true;
        }
        return false;
    }
}
