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

    private $commission_from_child = 0;
    private $child_agents = [];

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
        $sale_agents = $this->customerResourceModel
            ->select('customers.*,SUM(orderdetails.price * 20 / 100) as sum_price')
            ->join('orderdetails', 'orderdetails.agent_id = customers.id', 'LEFT OUTER JOIN')
            ->groupBy('customers.id')
            ->getAll();


        foreach ($sale_agents as $key => $s) {

            $this->findParent($sale_agents, $s->getSuperior_agent_id(), $s->sum_price / 2);
        }


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

                       <td>' . number_format($s->sum_price) . ' ₫</td>

                        <td class="text-right">
                            <a href="' . WEBROOT . 'admin/saleagent/detail/sid/' . $s->getId() . '" class="btn btn-sm bg-success-light mr-2">
                                <i class="far fa-edit mr-1"></i> Chi tiết
                            </a>
                        </td>
                    </tr>';

                unset($sale_agents[$key]);

                $this->showSaleAgent($sale_agents, $s->getId(), $char . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
            }
        }
    }


    private function findParent(&$sale_agents, $superior_agent_id = 0, $sum_price = 0)
    {
        $customer = $this->findInList($sale_agents, $superior_agent_id);

        if ($superior_agent_id != 0 && $superior_agent_id != null) {

            $customer->sum_price = $customer->sum_price + $sum_price;

            $this->findParent($sale_agents, $customer->getSuperior_agent_id(), $sum_price = $sum_price / 2);
        }
    }


    private function findInList(&$array, $id)
    {
        foreach ($array as $key => $value) {
            if ($value->getId() == $id) {
                return $value;
            }
        }
    }


    /**
     * Index
     * 
     * @param AcctionName Chi tiết đại lý
     */
    function detail($params)
    {
        if (!isset($params['sid'])) {
            header('Location: ' . WEBROOT . "admin/saleagent");
            die;
        }
        $sale_agents = $this->customerResourceModel

            ->getAll();


        $sale_agent = $this->customerResourceModel
            ->select('customers.*,SUM(orderdetails.price * 20 / 100) as sum_price')
            ->join('orderdetails', 'orderdetails.agent_id = customers.id', 'LEFT OUTER JOIN')
            ->where('customers.id', $params['sid'])
            ->groupBy('customers.id')
            ->get();

        $sale_success = $this->customerResourceModel
            ->join('orderdetails', 'orderdetails.agent_id = customers.id')

            ->join('products', 'products.id=orderdetails.product_id')

            ->where('customers.id', $params['sid'])

            ->join('orders', 'orders.id=orderdetails.order_id')

            ->where('orders.status', 4)

            ->select('customers.*,orderdetails.price * 20 / 100 as commission,
            orders.status as  orders_status, orders.date as  orders_date,
            products.name as products_name')
            ->getAll();

        $this->countCommissionFromChild($sale_agents, $sale_agent->getId(), 1);

        $commission_from_child = $this->commission_from_child;


        $this->with($sale_success);

        $this->with($sale_agent);

        $this->with($commission_from_child);

        $child_agents = $this->child_agents;
        $this->with($child_agents);

        $this->render("detail");
    }

    private function countCommissionFromChild($sale_agents, $superior_agent_id = 0, $lv = 1)
    {
        $lv = $lv * 2;
        foreach ($sale_agents as $key => $s) {

            // Nếu là chuyên mục con thì hiển thị
            if ($s->getSuperior_agent_id() == $superior_agent_id && $s->getSuperior_agent_id() != null) {

                $sale_agent = $this->customerResourceModel
                    ->select('customers.*,SUM(orderdetails.price * 20 / 100) / ' . $lv . ' as sum_price')
                    ->join('orderdetails', 'orderdetails.agent_id = customers.id', 'LEFT OUTER JOIN')
                    ->where('customers.id', $s->getId())
                    ->groupBy('customers.id')
                    ->get();

                $this->commission_from_child += $sale_agent->sum_price;

                array_push($this->child_agents,  $sale_agent);

                unset($sale_agents[$key]);

                $this->countCommissionFromChild($sale_agents, $s->getId(), $lv);
            }
        }
    }
}
