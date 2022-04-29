<?php

namespace ADMIN\Controllers;

use SRC\Models\Customer\CustomerResourceModel;

/**
 * HomeController
 * 
 * @param ControllerName Quản lý đại lý
 * @param SortOrder 7
 * @param Icon fas fa-comments-dollar
 */
class SaleAgentController  extends AdminControllers
{
    protected $customerResourceModel;
    function __construct()
    {
        parent::__construct();
        $this->customerResourceModel =  new CustomerResourceModel();
    }
    /**
     * Index
     * 
     * @param AcctionName Danh sách đại lý
     */
    function index()
    {
        $customers = $this->customerResourceModel
            ->select('customers.*, c2. name as superior_agent_name')
            ->join('customers c2', 'customers.superior_agent_id = c2.id', 'LEFT OUTER JOIN')
            ->whereNot('customers.superior_agent_id', null, 'AND', '<=>')
            ->getAll();
        $this->with($customers);
        $this->render("index");
    }
}
