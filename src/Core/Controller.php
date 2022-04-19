<?php

namespace SRC\Core;

use SRC\helper\SESSION;
use SRC\Models\Category\CategoryResourceModel;

class Controller
{
    private  $vars = [];
    private  $layout = "default";
    private  $view = '';
    private  $withNavbar = '';
    private  $filename;

    function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
    }
    function setLayout($layout = "default")
    {
        $this->layout = $layout;
    }
    function render($filename, $withNavbar = true)
    {
        if (strpos(get_class($this), 'ADMIN\Controllers') !== false) {
            $view = ROOT . "/src/admin/Views/" . get_class($this) . '/' . $filename . '.php';
            $view =  str_replace(['ADMIN\Controllers\\', 'Controller'], '', $view);
        } else {
            $view = ROOT . "src/Views/" . get_class($this) . '/' . $filename . '.php';
            $view =  str_replace(['SRC\Controllers\\', 'Controller'], '', $view);
        }
        $this->filename = $filename;
        $this->withNavbar = $withNavbar;
        $this->view = $view;

        $this->setView();
    }

    private function setView()
    {
        extract($this->vars);
        $mainView = $this->view;
        extract(['mainView' => $mainView]);
        extract(['categories' => $this->getCategories()]);

        extract($this->getOrder());

        if (!$this->layout) {
            ob_start();
            require $mainView;
            $content_for_layout = ob_get_clean();
            echo $content_for_layout;
            return;
        }
        ob_start();

        if ($this->withNavbar) {

            if (strpos(get_class($this), 'ADMIN\Controllers') !== false) {
                require(ROOT . 'src/admin/Views/Layouts/with_nav_bar.php');
            } else {
                require(ROOT . 'src/Views/Layouts/with_nav_bar.php');
            }
        } else {
            require $mainView;
        }

        $content_for_layout = ob_get_clean();


        if ($this->layout == false) {
            $content_for_layout;
        } else {
            if (strpos(get_class($this), 'ADMIN\Controllers') !== false) {
                require(ROOT . "src/admin/Views/Layouts/" . $this->layout . '.php');
            } else {
                require(ROOT . "src/Views/Layouts/" . $this->layout . '.php');
            }
        }
        return;
    }

    private function secure_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function secure_form($form)
    {
        foreach ($form as $key => $value) {
            $form[$key] = $this->secure_input($value);
        }
    }

    private function getCategories()
    {
        $categoryResourceModel = new CategoryResourceModel();
        return $categoryResourceModel->getAll();
    }

    private function getOrder()
    {
        $orderResourceClass = "SRC\Models\Order\OrderResourceModel";
        $orderDetailResourceClass =  "SRC\Models\OrderDetail\OrderDetailResourceModel";
        $orderResource = new $orderResourceClass;
        $orderDetailResource = new $orderDetailResourceClass;

        if (SESSION::get('customers') != null) {

            $d['order'] = $orderResource
                ->where('customer_id', SESSION::get('customers', 'id'))
                ->get() ?? [];

            if ($d['order']) {
                $d['orderDetails'] = $orderDetailResource
                    ->where('order_id', $d['order']->getId())
                    ->join('products', 'products.id=orderdetails.product_id')
                    ->select(
                        '
            products.id as product_id,
            products.name as product_name,
            products.description as product_description,
            products.hot as product_hot,
            products.price as product_price,
            products.discount as product_discount,
            products.category_id as product_category_id,
            products.brand_id as product_brand_id,
            
            orderdetails.id as orderdetail_id,
            orderdetails.order_id as orderdetail_order_id,
            orderdetails.product_id as orderdetail_product_id,
            orderdetails.quantity as orderdetail_quantity,
            orderdetails.price as orderdetail_price'
                    )
                    ->setFetchClass(\SRC\Models\Order\OrderFrontendViewModel::class)
                    ->getFrontendOrderView() ?? [];

                $d['orders_count'] = $orderDetailResource
                    ->select('sum(orderdetails.quantity) as orderdetails_sum_quantity')
                    ->where('order_id', $d['order']->getId())
                    ->get()->orderdetails_sum_quantity;
            } else {
                $d['orderDetails'] = false;
            }



            return ($d);
        }
        return [];
    }
}
