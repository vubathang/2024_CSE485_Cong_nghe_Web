<?php

class EmployeeService
{
    private $conn;

    public function __construct()
    {
        loadModel('Employee');
        $this->conn = getConn();
    }

    public function getAllEmployees()
    {
        $query = "SELECT e.*, d.departmentName
                FROM employees e
                LEFT JOIN departments d ON e.departmentId = d.departmentId ORDER BY e.employeeId DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $employees = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $employee = new Employee($row['employeeId'], $row['fullName'], $row['address'], $row['email'], $row['phone'], $row['position'], $row['avatar'], $row['departmentId'], $row['departmentName']);
            $employees[] = $employee;
        }
        return $employees;
    }

    public function getEmployeeById($employeeId)
    {
        $query = "SELECT e.*, d.departmentName
                FROM employees e
                LEFT JOIN departments d ON e.departmentId = d.departmentId
                WHERE e.employeeId = :employeeId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);
        $stmt->execute();
        $employee = null;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $employee = new Employee($row['employeeId'], $row['fullName'], $row['address'], $row['email'], $row['phone'], $row['position'], $row['avatar'], $row['departmentId'], $row['departmentName']);
        }
        return $employee;
    }

    public function createEmployee($fullName, $address, $email, $phone, $position, $avatar, $departmentId)
    {
        $query = "INSERT INTO employees (fullName, address, email, phone, position, avatar, departmentId)
                VALUES (:fullName, :address, :email, :phone, :position, :avatar, :departmentId)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':fullName', $fullName, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':position', $position, PDO::PARAM_STR);
        $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);
        $stmt->bindParam(':departmentId', $departmentId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateEmployee($employeeId, $fullName, $address, $email, $phone, $position, $avatar, $departmentId)
    {
        $query = "UPDATE employees
                SET fullName = :fullName, address = :address, email = :email, phone = :phone, position = :position, avatar = :avatar, departmentId = :departmentId
                WHERE employeeId = :employeeId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);
        $stmt->bindParam(':fullName', $fullName, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':position', $position, PDO::PARAM_STR);
        $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);
        $stmt->bindParam(':departmentId', $departmentId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteEmployee($employeeId)
    {
        $query = "DELETE FROM employees WHERE employeeId = :employeeId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function countEmployee() {
        $query = "SELECT COUNT(*) FROM employees";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count;
    }

    public function search($value, $col) {
        // $query = "SELECT * FROM employees WHERE ".$col." LIKE ?";
        $query = "SELECT e.*, d.departmentName
                FROM employees e
                LEFT JOIN departments d ON e.departmentId = d.departmentId
                WHERE e.".$col." LIKE ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(["%".$value."%"]);
        $employees = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $employee = new Employee($row['employeeId'], $row['fullName'], $row['address'], $row['email'], $row['phone'], $row['position'], $row['avatar'], $row['departmentId'], $row['departmentName']);
            $employees[] = $employee;
        }
        return $employees;
    }
}