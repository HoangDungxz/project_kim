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
    private $sale_agent_show = '';
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
        // $customers = $this->customerResourceModel
        //     ->select('customers.*, c2. name as superior_agent_name')
        //     ->join('customers c2', 'customers.superior_agent_id = c2.id', 'LEFT OUTER JOIN')
        //     ->whereNot('customers.superior_agent_id', null, 'AND', '<=>')
        //     ->getAll();
        // $this->with($customers);

        $sale_agents = $this->customerResourceModel->getAll();

        $this->showSaleAgent($sale_agents);
        $saleAgentsShow = $this->sale_agent_show;

        $this->with($saleAgentsShow);

        $this->render("index");
    }

    // HÀM ĐỆ QUY HIỂN THỊ sale_agent
    private function showSaleAgent($sale_agents, $superior_agent_id = 0, $char = '')
    {

        foreach ($sale_agents as $key => $s) {
            // Nếu là chuyên mục con thì hiển thị
            if ($s->getSuperior_agent_id() == $superior_agent_id && $s->getSuperior_agent_id() != null) {

                $this->sale_agent_show .=
                    '<tr>
                        <td>' . $s->getId() . '</td>
                        <td>
                            <h2 class="table-avatar">
                                <a href="#" class="avatar avatar-sm mr-2">
                                    <img class="avatar-img rounded-circle" alt="" src="' . PUBLIC_URL . 'upload/customers/' . $s->getDisplayAvatar() . '">
                                </a>
                                ' . $char . ($superior_agent_id == 0 ? "<strong>" . $s->getName() . "</strong>"  :  $s->getName()) . '
                            </h2>
                        </td>
                        <td><a href="mailto:' . $s->getEmail() . '">' . $s->getEmail() . '</a></td>
   

                        <td class="text-right">
                            <a href="' . WEBROOT . 'admin/saleagent/detaild/sid/' . $s->getId() . '" class="btn btn-sm bg-success-light mr-2">
                                <i class="far fa-edit mr-1"></i> Chi tiết
                            </a>
                        </td>
                    </tr>';

                unset($sale_agents[$key]);

                $this->showSaleAgent($sale_agents, $s->getId(), $char . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
            }
        }
    }
}
