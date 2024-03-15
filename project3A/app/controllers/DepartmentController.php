<?php

class DepartmentController
{
    private $departmentService;

    public function __construct()
    {
        $this->departmentService = callService('Department');
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['keyword'])) {
                $keyword = $_POST['keyword'];
                $this->search($keyword, 'departmentName');

            }
        }else {
            displayView('department/index', [
                'departments' => $this->departmentService->getAllDepartments()
            ]);
        }
    }

    public function show()
    {
        displayView('department/show', ['department' => $this->departmentService->getDepartmentById($_GET['id'])]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['departmentName'], $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['parentDepartment'])) {
                $departmentName = $_POST['departmentName'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $parentDepartmentId = $_POST['parentDepartment'] !== '' ? $_POST['parentDepartment'] : NULL;
                if ($this->departmentService->createDepartment($departmentName, $address, $email, $phone, $parentDepartmentId)) {
                    header('Location: ' . DOMAIN . '?controller=department&action=index');
                } else {
                    header('Location: ' . DOMAIN . '?controller=department&action=create?error=Failed to create department');
                }
                exit;
            }
        }
        displayView('department/create', ['departments' => $this->departmentService->getAllDepartments()]);
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name'], $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['parentDepartment'])) {
                $departmentId = $_GET['id'];
                $departmentName = $_POST['name'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $parentDepartmentId = $_POST['parentDepartment'] !== '' ? $_POST['parentDepartment'] : NULL;
                if ($this->departmentService->updateDepartment($departmentId, $departmentName, $address, $email, $phone, $parentDepartmentId)) {
                    header('Location: ' . DOMAIN . '?controller=department&action=index');
                } else {
                    header('Location: ' . DOMAIN . '?controller=department&action=edit&id=' . $_GET['id'] . '?error=Failed to update department');
                }
                exit;
            }
        }
        displayView('department/edit', [
                'departments' => $this->departmentService->getAllDepartments(),
                'department' => $this->departmentService->getDepartmentById($_GET['id'])]
        );
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            if ($this->departmentService->deleteDepartment($_GET['id'])) {
                header('Location: ' . DOMAIN . '?controller=department&action=index');
            } else {
                header('Location: ' . DOMAIN . '?controller=department&action=index?error=Failed to delete department');
            }
        }
    }

    public function search($keyword, $colName)
    {
        $deparments = $this->departmentService->search($keyword, $colName);
        displayView('department/index', ['departments' => $deparments]);
    }
}