<?php 

class AuthController {
    private $userService;

    public function __construct() {
        $this->userService = callService('User');
    }

    public function index() {
            $this->login();
    }

    public function login() {
        $errs = null;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['username']) && isset($_POST['password'])) {
                if(!empty($_POST['username']) && !empty($_POST['password'])) {
                    $res = $this->userService->validateUser($_POST['username'], $_POST['password']);
                    if($res['status'] == 'err') {
                        $errs = $res['message'];
                    } 
                    else if($res['status'] == 'success') {
                        $_SESSION['uid'] = $res['metadata']['uid'];
                        $_SESSION['role'] = $res['metadata']['role'];
                        header('Location :'.DOMAIN);
                    }
                }
            }
        }
        displayView('auth/login', [
            'error' => $errs
        ]);
    }

    public function logout() {
        unset($_SESSION['uid']);
        unset($_SESSION['role']);
        header('Location: '.DOMAIN);
    }

    public function register() {
        $errors = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(strlen(trim($_POST['password'])) < 8) {
                $errors['password'] = 'Mật khẩu phải trên 8 kí tự!';
                if($this->userService->validateUser($_POST['username'], $_POST['password'])) {
                    $errors['username'] = 'Tên đăng nhập đã tồn tại';
                }
            }
            $res = $this->userService->register($_POST['username'], $_POST['password'], 'regular', $_POST['fullName'], $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['position'], $_POST['departmentId'], 'avatar.jpg');   
            if($res) {
                header('Location: '.DOMAIN);
            }
        }
        displayView('auth/register', [
            'errors' => $errors
        ]);
    }
}