<?php

namespace ADMIN\Controllers;

use SRC\Core\Controller;
use SRC\helper\MSG;
use SRC\helper\SESSION;
use SRC\Models\User\UserModel;
use SRC\Models\User\UserResourceModel;


class AdminControllers extends Controller
{
    protected $userResoureModel;
    public function __construct()
    {
        $this->userResoureModel = new UserResourceModel();
        // ĐĂNG NHẬP    
        $controller =  strtolower(SESSION::pull('request', 'controller'));
        $action = strtolower(SESSION::pull('request', 'action'));

        // các page được phép truy cập khi chưa đăng nhập

        // kiểm tra session có user chưa
        $allowPages = [ // các pages k cần login
            "user/login",
            "user/logout",
            "user/register"
        ];

        if (SESSION::get('users', 'id') == null) {


            // nếu chưa kiểm tra xem có phải là trang login hoặc đăng ký không nếu không thì chuyển về log in

            if (array_search("$controller/$action", $allowPages) === false) {
                header('Location: ' . WEBROOT . "admin/user/login");
            } else {
                // Nếu ở trang login vào chưa có trong SESsION
                // giải nén POST và tiến hành đăng nhập lưu vào SESSiON ở UserResourceModel
                extract($_POST);
                if (isset($name) && isset($password)) {;
                    $user = new UserModel();
                    $user->setEmail($name);
                    $user->setPhone($name);
                    $user->setPassword($password);

                    if ($this->userResoureModel->login($user) != false) {
                        MSG::send('Đăng nhập thành công', 'success');
                        header('Location: ' . WEBROOT . "admin");
                    } else {
                        MSG::send('Đăng nhập thất bại');
                        $messager = "Bạn nhập sai tên và mật khẩu hoặc tài khoản bị khóa </br>Vui lòng kiểm tra lại";
                        $this->with($messager);
                        $this->render('login', false);
                        die;
                    }
                    // die('đá');
                }
            }
        }


        // tạo memu

        $menu =  $this->createMenu();

        // sắp xếp theo sort order
        usort($menu, function ($a, $b) {
            return (int)$a->sort_order - (int)$b->sort_order;
        });


        $uri =  strtolower(SESSION::pull('request', 'controller'));

        $this->with($menu);
        $this->with($uri);


        // PHÂN QUYỀN
        // lấy danh sách các quyền của người dùng
        $permissions = $this->userResoureModel
            ->select('users.id,permissions.paths')
            ->join('permissions', 'users.permission_id=permissions.id')
            ->get();

        // chuyển đổi danh sách sang array
        $alowPermissions = json_decode($permissions->paths);

        // xem link có thuộc allowPages không
        if (array_search("$controller/$action", $allowPages) === false) {

            // xem link có thuộc alowPermissions không
            if (array_search("$controller/$action", $alowPermissions) === false) {

                $this->render('permission_denied', true, 'Permission');
                die;
            }
        }
    }


    function createMenu()
    {
        $controllerDocs = [];
        foreach (array_filter(glob(ROOT . 'src/admin/Controllers/*'), 'is_file') as $file) {

            if (!strpos($file, 'Controller.php')) {
                continue;
            }

            $file = str_replace([ROOT . 'src/admin/Controllers/', '.php'], '', $file);

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
        $result->action = [];

        foreach ($controller->getMethods() as  $action) {

            $comment_action_string = $action->getDocComment();
            $resultAction = new \stdClass;
            if (
                $comment_action_string != false
            ) {
                $actionName = $this->getCommentParam($comment_action_string, 'AcctionName');
                $resultAction->action_name = $actionName;
                $resultAction->action_path = $result->controller_path . '/' . $action->getName();
                array_push($result->action, $resultAction);
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
