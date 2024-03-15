<?php 

class AuthController {
    private $userService;
    private $employeeService;
    private $departmentService;

    public function __construct() {
        $this->userService = callService('User');
        $this->employeeService = callService('Employee');
        $this->departmentService = callService('Department');
    }

    public function index() {
            $this->login();
    }

    public function login() {
        $errs = null;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['username']) && isset($_POST['password'])) {
                if(!empty($_POST['username']) && !empty($_POST['password'])) {
                    if(isset($_POST['rememberAcc']) && $_POST['rememberAcc'] == 'on') {
                        $_SESSION['username_login'] = $_POST['username'];
                        $_SESSION['password_login'] = $_POST['password'];
                        $_SESSION['rememberAcc'] = $_POST['rememberAcc'];
                    } else {
                        unset($_SESSION['username_login']);
                        unset($_SESSION['password_login']);
                        unset($_SESSION['rememberAcc']);
                    }
                    $res = $this->userService->validateUser($_POST['username'], $_POST['password']);
                    if($res['status'] == 'err') {
                        $errs = $res['message'];
                    } 
                    else if($res['status'] == 'success') {
                        $_SESSION['uid'] = $res['metadata']['uid'];
                        $_SESSION['role'] = $res['metadata']['role'];
                        header('Location: '.DOMAIN);
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
        $departmentCategory = $this->departmentService->getAllDepartments();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $resEmployee = $this->employeeService->createEmployee($_POST['fullName'], $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['position'], 'avatar.jpg', $_POST['departmentId']);
            // $employeeId = $this->employeeService->countEmployee();
            // $resUser = $this->userService->register($_POST['username'], $_POST['password'], 'regular', $employeeId);   
            // if($resUser && $resEmployee) {
            //     header('Location: '.DOMAIN);
            // }
            try {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $fullName = $_POST['fullName'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $position = $_POST['position'];
                $avatar = '/assets/images/default.png';// $_POST['position'];
                $departmentId = $_POST['departmentId'];
                // $data_user = [$username, $password];
                $data_employee = [$fullName, $address, $email, $phone, $position, $avatar, $departmentId];
                $result = $this->userService->register(
                    $data_employee, 
                    $password,
                    $username
                );
                if($result) {
                    echo "H";
                    echo 'Location : '.DOMAIN;
                    header('Location: '.DOMAIN);
                }
            } catch(PDOException $e) {
                $errors[] = $e;
            }
        }
        displayView('auth/register', [
            'errors' => $errors,
            'departmentCategory' => $departmentCategory
        ]);
    }
}