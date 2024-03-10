<?php
class  EmployeeService {
    private $conn;

    public function __construct() {
        loadModel('Employee');
        $this->conn = getConn();
    }
    public function getAllEmployees()
    {
        $query = "SELECT * FROM employees";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $employees = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $employee = new Employee($row['employeeId'], $row['fullName'], $row['address'], $row['email'], $row['phone'], $row['position'], $row['avatar']);
            $employees[] = $employee;
        }
        return $employees;
    }
    public function getEmployeeById($id)
    {
        $query = "SELECT * FROM employees WHERE employeeId = :employessId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':employessId', $id, PDO::PARAM_INT);
        $stmt->execute();
        $employee = null;
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $employee = new Employee($row['employeeId'], $row['fullName'], $row['address'], $row['email'], $row['phone'], $row['position'], $row['avatar']);
        }
        return $employee;
    }
    public function addEmployee($fullName, $address, $email, $phone, $position, $avatar)
    {
        $query = "INSERT INTO employees (fullName, address, email, phone, position, avatar) VALUES (:fullName, :address, :email, :phone, :position, :avatar)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':fullName', $fullName, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':position', $position, PDO::PARAM_STR);
        $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);

        $stmt->execute();

    }
    public function updateEmployee($id, $fullName, $address, $email, $phone, $position, $avatar)
    {
        $query = "UPDATE employees SET fullName = :fullName, address = :address, email = :email, phone = :phone, position = :position, avatar = :avatar WHERE employeeId = :employeeId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':employeeId', $id, PDO::PARAM_INT);
        $stmt->bindParam(':fullName', $fullName, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':position', $position, PDO::PARAM_STR);
        $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function deleteEmployee($id)
    {
        $query = "DELETE FROM employees WHERE employeeId = :employeeId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':employeeId', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function searchEmployee($keyword)
    {
        $keyword = "%$keyword%";
        $query = "SELECT * FROM employees WHERE fullName LIKE :keyword";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
        $stmt->execute();
        $employees = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $employee = new Employee($row['employeeId'], $row['fullName'], $row['address'], $row['email'], $row['phone'], $row['position'], $row['avatar']);
            $employees[] = $employee;
        }
        var_dump($employees);
        return $employees;
    }
    public function getEmployeeByDepartmentId($departmentId)
    {
        $query = "SELECT * FROM employees WHERE departmentId = :departmentId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':departmentId', $departmentId, PDO::PARAM_INT);
        $stmt->execute();
        $employees = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $employee = new Employee($row['employeeId'], $row['fullName'], $row['address'], $row['email'], $row['phone'], $row['position'], $row['avatar']);
            $employees[] = $employee;
        }
        return $employees;
    }
}