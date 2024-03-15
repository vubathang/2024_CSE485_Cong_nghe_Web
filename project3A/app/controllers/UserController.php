<?php 

class UserController {
    private $userService;
    private $employeeService;
    private $departmentService;

    public function __construct() {
        $this->userService = callService('User');
        $this->employeeService = callService('Employee');
        $this->departmentService = callService('Department');
    }

    public function index() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['keyword'])) {
                $keyword = $_POST['keyword'];
                $this->search($keyword, 'username');
            }
        }else {
            $username = $_GET['username'] ?? null;
            $user = null;
            if ($username) {
                $user = $this->userService->getUserByUsername($username);
            }
            $users = $this->userService->getAllUsers();
            displayView('user/index', [
                'user' => $user,
                'users' => $users
            ]);
        }
    }

    public function edit() {
        $error  = null;
        $id = $_SESSION['uid'];
        $user = $this->userService->getUserByEmployeeId($id);
        $employee = $this->employeeService->getEmployeeById($id);
        
        $deparments = $this->departmentService->getAllDepartments();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $resUser = true;
            if(!empty($_POST['oldPassword'])) {
                $check = $this->userService->validateUser($_POST['username'], $_POST['oldPassword']);
                if($check) {
                    $resUser = $this->userService->updateUserPw($_POST['username'], $_POST['newPassword']);
                }
            }
            $resEmployee = $this->employeeService->updateEmployee($_POST['employeeId'], $_POST['fullName'], $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['position'], 'avatar.jpg',$_POST['departmentId']);
            if($resUser && $resEmployee) header('Location: '.DOMAIN.'?controller=user&action=edit');
            else $error = 'Thay đổi thất bại';
            // $employeeId, $fullName, $address, $email, $phone, $position, $avatar, $departmentId
            
        }
        displayView('user/edit', [
            'user' => $user,
            'employee' => $employee,
            'error' => $error,
            'deparments' => $deparments
        ]);
    }

    public function edit_role() {
        $username = $_GET['username'] ?? null;
        $user = $this->userService->getUserByUsername($username);
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['role'])) {
                $username = $_POST['username'];
                $role = $_POST['role'];
                if ($this->userService->updateRole($username, $role)) {
                    header('Location: '.DOMAIN.'?controller=user&action=index');
                }else {
                    $error = 'Thay đổi thất bại';
                }
            }
        }
        displayView('user/edit_role', [
            'user' => $user,
            'error' => $error
        ]);
    }
    public function search($keyword, $colName)
    {
        $users = $this->userService->search($keyword, $colName);
        displayView('user/index', [
            'users' => $users,
            'employees'=> $this->employeeService->getAllEmployees()
        ]);
    }
    public function delete()
    {
        if (isset($_GET['username'])) {
            $user = $this->userService->getUserByUsername($_GET['username']);

            if ($user == null) {
                header('Location: ' . DOMAIN . '?controller=user&action=index?error=User not found');
            } else {
                if ($this->userService->deleteUserByEmployeeId($user->getEmployeeId())) {

                    $this->employeeService->deleteEmployee($user->getEmployeeId());
                    header('Location: ' . DOMAIN . '?controller=user&action=index');
                }
            }
        }
    }
}