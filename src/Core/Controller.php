<?php

namespace SRC\Core;

use SRC\Models\Category\CategoryResourceModel;

class Controller
{
    private $vars = [];
    private  $layout = "default";
    private  $view = '';

    function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
    }
    function setLayout($layout = "default")
    {
        $this->layout = $layout;
    }
    function setView($filename)
    {
        if (strpos(get_class($this), 'ADMIN\Controllers') !== false) {
            $view = ROOT . "/src/admin/Views/" . get_class($this) . '/' . $filename . '.php';
            $view =  str_replace(['ADMIN\Controllers\\', 'Controller'], '', $view);
        } else {
            $view = ROOT . "src/Views/" . get_class($this) . '/' . $filename . '.php';
            $view =  str_replace(['SRC\Controllers\\', 'Controller'], '', $view);
        }
        $this->view = $view;
    }

    function render($filename)
    {
        extract($this->vars);
        ob_start();
        if (strpos(get_class($this), 'ADMIN\Controllers') !== false) {
            $view = ROOT . "/src/admin/Views/" . get_class($this) . '/' . $filename . '.php';
            $view =  str_replace(['ADMIN\Controllers\\', 'Controller'], '', $view);
        } else {
            $view = ROOT . "src/Views/" . get_class($this) . '/' . $filename . '.php';
            $view =  str_replace(['SRC\Controllers\\', 'Controller'], '', $view);
            $categories = $this->getCategories();
        }
        $mainView = $this->view;
        require $view;

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

        return $content_for_layout;
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
}
