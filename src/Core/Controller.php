<?php

namespace SRC\Core;

use SRC\helper\ERROR;
use SRC\helper\SESSION;

class Controller
{
    private  $vars = [];
    private  $layout = "default";
    private  $withNavbar = '';
    private  $variables = [];

    function setLayout($layout = "default")
    {
        $this->layout = $layout;
    }
    function render($filename, $withNavbar = true)
    {
        if (strpos(get_class($this), 'ADMIN\Controllers') !== false) {
            $mainView = ROOT . "src/admin/Views/" . get_class($this) . '/' . $filename . '.php';
            $mainView =  str_replace(['ADMIN\Controllers\\', 'Controller'], '', $mainView);
        } else {
            $mainView = ROOT . "src/Views/" . get_class($this) . '/' . $filename . '.php';
            $mainView =  str_replace(['SRC\Controllers\\', 'Controller'], '', $mainView);
        }
        $this->withNavbar = $withNavbar;


        extract($this->vars);

        extract($this->variables);

        extract(['mainView' => $mainView]);

        if (!$this->layout) {
            ob_start();
            require $mainView;
            $content_for_layout = ob_get_clean();

            return $content_for_layout;
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
        // die('asdad');
        echo SESSION::pull('msgs');
        SESSION::remove('msgs');


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


    protected function with($variables)
    {
        $trace = debug_backtrace();
        $file = file($trace[0]['file']);
        $line = $file[$trace[0]['line'] - 1];
        $name = str_replace(['$this->with($', ');', ' ', '/\s+/u'], '', $line);

        $name = preg_replace("/\r|\n/", "", $name);
        $this->variables =  array_merge($this->variables, [$name => $variables]);
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
}
