<?php

class DepartmentService
{
    private $conn;

    public function __construct()
    {
        loadModel('Department');
        $this->conn = getConn();
    }

    public function getAllDepartments()
    {
        $query = "SELECT d1.*, d2.departmentName AS parentDepartmentName
                FROM departments d1 LEFT JOIN departments d2 ON d1.parentDepartmentId = d2.departmentId  ORDER BY d1.departmentId DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $departments = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $department = new Department($row['departmentId'], $row['departmentName'], $row['address'], $row['email'], $row['phone'], $row['parentDepartmentId'], $row['parentDepartmentName']);
            $departments[] = $department;
        }
        return $departments;
    }

    public function getDepartmentById($departmentId)
    {
        $query = "SELECT d1.*, d2.departmentName AS parentDepartmentName
                FROM departments d1 LEFT JOIN departments d2 ON d1.parentDepartmentId = d2.departmentId
                WHERE d1.departmentId = :departmentId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':departmentId', $departmentId, PDO::PARAM_INT);
        $stmt->execute();
        $department = null;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $department = new Department($row['departmentId'], $row['departmentName'], $row['address'], $row['email'], $row['phone'], $row['parentDepartmentId'], $row['parentDepartmentName']);
        }
        return $department;
    }

    public function createDepartment($departmentName, $address, $email, $phone, $parentDepartmentId)
    {
        $query = "INSERT INTO departments (departmentName, address, email, phone, parentDepartmentId)
                VALUES (:departmentName, :address, :email, :phone, :parentDepartmentId)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':departmentName', $departmentName, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':parentDepartmentId', $parentDepartmentId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateDepartment($departmentId, $departmentName, $address, $email, $phone, $parentDepartmentId)
    {
        $query = "UPDATE departments
                SET departmentName = :departmentName, address = :address, email = :email, phone = :phone, parentDepartmentId = :parentDepartmentId
                WHERE departmentId = :departmentId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':departmentId', $departmentId, PDO::PARAM_INT);
        $stmt->bindParam(':departmentName', $departmentName, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':parentDepartmentId', $parentDepartmentId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteDepartment($departmentId)
    {
        $query = "SELECT * FROM employees WHERE departmentId = :departmentId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':departmentId', $departmentId, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return false;
        } 
        $query = "SELECT * FROM departments WHERE parentDepartmentId = :departmentId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':departmentId', $departmentId, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $query = "UPDATE departments SET parentDepartmentId = NULL WHERE parentDepartmentId = :departmentId";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':departmentId', $departmentId, PDO::PARAM_INT);
            $stmt->execute();
        }
        $query = "DELETE FROM departments WHERE departmentId = :departmentId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':departmentId', $departmentId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function search($value, $col) {
        $query = "SELECT * FROM departments WHERE ".$col." LIKE ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(["%".$value."%"]);
        $departments = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $department = new Department($row['departmentId'], $row['departmentName'], $row['address'], $row['email'], $row['phone'], $row['parentDepartmentId']);
            $departments[] = $department;
        }
        return $departments;
    }
}