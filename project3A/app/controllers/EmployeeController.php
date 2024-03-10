<?php 

class EmployeeController {
    private $employeeService;

    public function __construct() {
        $this->employeeService = callService('Employee');
    }
    public function index() {
        $employees = $this->employeeService->getAllEmployees();
        displayView('employee/index', [
            'employees' => $employees
        ]);
    }
    public function show() {
        $id = $_GET['id'];
        $employee = $this->employeeService->getEmployeeById($id);
        displayView('employee/show', [
            'employee' => $employee
        ]);
//        chuyen tu mang sang mang ok -> tai sao phai chuyen tu doi tuong sang mang
//        vi tinh chat bao dong trong OOP de che dau thong tin
    }
    public function add() {
        //co lay du lieu khong? khong
        displayView('employee/add');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(isset($_POST['fullName'], $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['position'])) {
                $fullName = $_POST['fullName'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $position = $_POST['position'];
                $avatar = 'avatar.jpg';
                $this->employeeService->addEmployee($fullName, $address, $email, $phone, $position, $avatar);
            }
            header('Location: '.DOMAIN.'?controller=employee&action=index');
        }
    }

    public function update() {
        displayView('employee/update', [
            'employee' => $this->employeeService->getEmployeeById($_GET['id'])
        ]);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['fullName'], $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['position'])) {
                $employeeId = $_GET['id'];
                $fullName = $_POST['fullName'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $position = $_POST['position'];
                $avatar = 'avatar.jpg';
                $this->employeeService->updateEmployee($employeeId, $fullName, $address, $email, $phone, $position, $avatar);
            }
            header('Location: '.DOMAIN.'?controller=employee&action=index');
        }
    }
    public function delete() {
        $this->employeeService->deleteEmployee($_GET['id']);
        header('Location: '.DOMAIN.'?controller=employee&action=index');
    }
    public function search() {
        $employees = $this->employeeService->searchEmployee($_POST['keyword']);
        displayView('employee/index', [
            'employees' => $employees
        ]);
    }
}