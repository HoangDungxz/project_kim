<?php

namespace SRC\Models\Customer;

use SRC\Core\ResourceModel;

class CustomerResourceModel extends ResourceModel
{

    public function login($customer)
    {

        $customerLogined =  $this->where('email', $customer->getEmail())
            ->where('password', md5($customer->getPassword()))
            ->select("name,email,address,phone,id,superior_agent_id")
            ->get();

        if (($customerLogined) != null) {
            $this->saveSession($customerLogined);
            return true;
        }
        return false;
    }
    public function loginAfterRegister($customer)
    {

        $customerLogined =  $this->where('email', $customer->getEmail())
            ->where('password', ($customer->getPassword()))
            ->select("name,email,address,phone,id")
            ->get();

        if (($customerLogined) != null) {
            $this->saveSession($customerLogined);
            return true;
        }
        return false;
    }
}
