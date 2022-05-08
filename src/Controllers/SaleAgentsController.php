<?php

namespace SRC\Controllers;

use SRC\helper\MSG;
use SRC\helper\SESSION;
use SRC\helper\URL;
use SRC\Models\Customer\CustomerResourceModel;

class SaleAgentsController extends FrontendControllers
{

    private $customerResourceModel;

    public function __construct()
    {
        parent::__construct();
        $this->customerResourceModel = new CustomerResourceModel();
    }

    function invite($params)
    {
        // check đăng nhập
        if (SESSION::get('customers', 'id') == null) {
            MSG::send('Bạn cần đăng nhập để Nhận lời làm đại lý');
            $this->render('login', false, 'Customers');
            die;
        }

        // giải mã url tìm đại lý bằng email
        if (isset($params['superior_agent'])) {
            $superior_agent = $this->customerResourceModel
                ->where('email', URL::base64_decode_url($params['superior_agent']))
                ->get();

            $superior_agent_id = $superior_agent->getId();

            if ($superior_agent_id == SESSION::get('customers', 'id')) {
                MSG::send('Bạn không thể mời chính mình');
                header("Location: " . WEBROOT);
                die;
            }

            $this->with($superior_agent);
        }


        // lúc ấn có
        if (isset($_POST['ok'])) {

            $customer = $this->customerResourceModel->getById(SESSION::get('customers', 'id'));

            $customer->setSuperior_agent_id($superior_agent_id ?? 0);

            if ($this->customerResourceModel->save($customer)) {
                MSG::send('Đăng ký làm đại lý thành công', 'success');
                header("Location: " . WEBROOT);
                die;
            }
        }

        $this->render('invite', false);
    }
}
