<?php

class EmployeeController
{
    private $employeeService;
    private $userService;
    private $departmentService;

    public function __construct()
    {
        $this->employeeService = callService('Employee');
        $this->departmentService = callService('Department');
        $this->userService = callService('User');
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['keyword'])) {
                $keyword = $_POST['keyword'];
                $this->search($keyword, 'fullName');
            }
        } else {
            displayView('employee/index', [
                'employees' => $this->employeeService->getAllEmployees(),
                'departments' => $this->departmentService->getAllDepartments()
            ]);
        }
    }

    public function show()
    {
        displayView('employee/show', [
            'employee' => $this->employeeService->getEmployeeById($_GET['id']),
            'departments' => $this->departmentService->getAllDepartments()
        ]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['fullName'], $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['position'], $_POST['departmentId'])) {
                $fullName = $_POST['fullName'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $position = $_POST['position'];
                // $avatar = $_POST['avatar'];
                $departmentId = $_POST['departmentId'];
                if ($this->employeeService->createEmployee($fullName, $address, $email, $phone, $position, 'avatar.jpg', $departmentId)) {
                    header('Location: ' . DOMAIN . '?controller=employee&action=index');
                } else {
                    header('Location: ' . DOMAIN . '?controller=employee&action=create?error=Failed to create employee');
                }
                exit;
            }
        }
        displayView('employee/create',
            ['departments' => $this->departmentService->getAllDepartments()]
        );
    }

    // public function updateEmployee($employeeId, $fullName, $address, $email, $phone, $position, $avatar, $departmentId)
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['fullName'], $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['position'], $_POST['departmentId'])) {
                $employeeId = $_GET['id'];
                $fullName = $_POST['fullName'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $position = $_POST['position'];
                $avatar = $_POST['avatar'];
                $departmentId = $_POST['departmentId'];
                if ($this->employeeService->updateEmployee($employeeId, $fullName, $address, $email, $phone, $position, 'avatar.jpg', $departmentId)) {
                    header('Location: ' . DOMAIN . '?controller=employee&action=index');
                } else {
                    header('Location: ' . DOMAIN . '?controller=employee&action=edit&id=' . $_GET['id'] . '?error=Failed to update employee');
                }
                exit;
            }
        }
        displayView('employee/edit', [
            'employee' => $this->employeeService->getEmployeeById($_GET['id']),
            'departments' => $this->departmentService->getAllDepartments()
        ]);
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            if ($this->employeeService->getEmployeeById($_GET['id']) == null) {
                header('Location: ' . DOMAIN . '?controller=employee&action=index?error=Employee not found');
            } else {
                if ($this->userService->deleteUserByEmployeeId($_GET['id'])) {
                    $this->employeeService->deleteEmployee($_GET['id']);
                    header('Location: ' . DOMAIN . '?controller=employee&action=index');
                };
            }
        }
    }

    public function search($keyword, $colName)
    {
        $employees = $this->employeeService->search($keyword, $colName);
        displayView('employee/index', [
            'employees' => $employees,
            'departments' => $this->departmentService->getAllDepartments()
        ]);
    }
}