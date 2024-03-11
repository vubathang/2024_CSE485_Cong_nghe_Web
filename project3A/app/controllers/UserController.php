<?php 

class UserController {
    private $userService;
    private $employeeService;

    public function __construct() {
        $this->userService = callService('User');
        $this->employeeService = callService('Employee');
    }

    public function index() {
        $username = $_GET['username'] ?? null;
        $user = null;
        if($username) {
            $user = $this->userService->getUserByUsername($username);
        }
        $users = $this->userService->getAllUsers();
        displayView('user/index', [
            'user' => $user,
            'users' => $users
        ]);
    }

    public function edit() {
        $error  = null;
        $id = $_SESSION['uid'];
        $user = $this->userService->getUserByEmployeeId($id);
        $employee = $this->employeeService->getEmployeeById($id);
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $check = $this->userService->validateUser($_POST['username'], $_POST['oldPassword']);
            if($check) {
                $resUser = $this->userService->updateUser($_POST['username'], $_POST['newPassword']);
                $resEmployee = $this->employeeService->updateEmployee($_POST['employeeId'], $_POST['fullName'], $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['position'], $_POST['departmentId']);
                if($resUser && $resEmployee) header('Location: '.DOMAIN);
                else $error = 'Thay đổi thất bại';
            }
        }
        displayView('user/edit', [
            'user' => $user,
            'employee' => $employee,
            'error' => $error
        ]);
    }
}