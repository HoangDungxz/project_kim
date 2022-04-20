<?php

namespace ADMIN\Controllers;

use SRC\Core\Controller;
use SRC\helper\SESSION;

/**
 * Index
 * 
 * @param ControllerName Trang admin
 * @return void
 */
class AdminControllers extends Controller
{

    public function __construct()
    {

        if (SESSION::pull('memu') != null) {
            $menu = SESSION::pull('memu');
        } else {

            $menu =  $this->createMenu();

            usort($menu, function ($a, $b) {
                return (int)$a->sort_order - (int)$b->sort_order;
            });
            SESSION::push('memu', $menu);
        }
        $uri =  strtolower(SESSION::pull('request', 'controller'));
        $this->with($menu);
        $this->with($uri);
    }


    function authentication()
    {
    }

    function createMenu()
    {
        $controllerDocs = [];
        foreach (array_filter(glob(ROOT . 'src/admin/Controllers/*'), 'is_file') as $file) {
            $file = str_replace([ROOT . 'src/admin/Controllers/', '.php'], '', $file);

            if ($file == "AdminControllers") {
                continue;
            }

            $controllerClass =  __NAMESPACE__ . '\\' . $file;

            $controllerDoc = $this->getControllerDoc($controllerClass);
            array_push($controllerDocs, $controllerDoc);
        };
        return $controllerDocs;
    }

    protected function getControllerDoc($class)
    {
        $controller = new \ReflectionClass($class);

        $comment_string = ($controller->getDocComment());
        $result = new \stdClass;

        if ($comment_string != false) {

            $result->controller_name = $this->getCommentParam($comment_string, 'ControllerName');
            $result->controller_path = strtolower(str_replace("Controller", '', $controller->getShortName()));
            $result->sort_order = str_replace(" ", "", $this->getCommentParam($comment_string, 'SortOrder'));
            $result->icon = $this->getCommentParam($comment_string, 'Icon');
        }
        $result->methodNames = [];

        foreach ($controller->getMethods() as $key => $method) {

            $comment_action_string = $method->getDocComment();

            if (
                $comment_action_string != false
            ) {
                $methodName = $this->getCommentParam($comment_action_string, 'AcctionName');
                array_push($result->methodNames, [
                    'action_name' => $methodName,
                    'action_path' => $result->controller_path . '/' . $method->getName()
                ]);
            }
        }
        return $result;
    }

    private function getCommentParam($comment_string, $repplace)
    {
        $pattern = "#(@[a-zA-Z]+\s*[a-zA-Z0-9, ()_].*)#";
        preg_match_all($pattern, $comment_string, $matches, PREG_PATTERN_ORDER);

        foreach ($matches[0] as  $value) {
            if (strpos($value, "@param $repplace") !== false) {
                return str_replace("@param $repplace ", '', $value);
            }
        }
    }
}
