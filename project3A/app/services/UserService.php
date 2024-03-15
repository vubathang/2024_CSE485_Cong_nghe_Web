<?php

class UserService {
    private $conn;
    const TABLE_NAME = 'users';

    public function __construct() {
        loadModel('User');
        $this->conn = getConn();
    }

    public function getAllUsers() {
        $query = "SELECT * FROM `".self::TABLE_NAME."`";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $users = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($row['username'], $row['password'], $row['role'], $row['employeeId']);
            $users[] = $user;
        }
        return $users;
    }

    public function getUserByUsername($username) {
        $query = "SELECT * FROM `".self::TABLE_NAME."` WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = null;
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($row['username'], $row['password'], $row['role'], $row['employeeId']);
        }
        return $user;
    }

    public function getUserByEmployeeId($id) {
        $query = "SELECT * FROM `".self::TABLE_NAME."` WHERE employeeId = :employeeId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':employeeId', $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = null;
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($row['username'], $row['password'], $row['role'], $row['employeeId']);
        }
        return $user;
    }

    public function validateUser($username, $password) {
        $user = $this->getUserByUsername($username);
        if(!$user) {
            return [
                'status' => 'err',
                'message' => 'Tài khoản không tồn tại'
            ];
        }
        if(!password_verify($password, $user->getPassword())) {
            return [
                'status' => 'err',
                'message' => 'Mật khẩu không đúng'
            ];   
        }

        $_SESSION['uid'] = $user->getEmployeeId();
        $_SESSION['role'] = $user->getRole();
        return [
            'status' => 'success',
            'metadata' => [
                'uid' => $user->getEmployeeId(),
                'role' => $user->getRole()
            ],
        ];
    }

    public function register(array $data_employee, $password = "user@123", $username = null) {
        try {
            $this->conn->beginTransaction();

            $employeeQuery = "INSERT INTO employees (fullName, address, email, phone, position, avatar, departmentId) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $employeeStmt = $this->conn->prepare($employeeQuery);
            $employeeStmt->execute($data_employee);
    
            $employeeId = $this->conn->lastInsertId();
            if($username == null) {
                $username = 'user'.$employeeId;
            }
            $role = 'regular';
            $userQuery = "INSERT INTO `".self::TABLE_NAME."` (username, password, role, employeeId)
                          VALUES (?, ?, ?, ?)";
            $userStmt = $this->conn->prepare($userQuery);
            $userStmt->execute([$username, password_hash($password, PASSWORD_DEFAULT), $role, $employeeId]);
            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }    

    public function updateUserPw($username, $password) {
        $query = "UPDATE `".self::TABLE_NAME."` SET password = :password WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateRole($username, $role)
    {
        echo $username;
        echo $role;
        echo 'hi';
        $query = "UPDATE users SET role = :role WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function search($value, $colName) {
        $query = "SELECT * FROM users WHERE ".$colName." LIKE ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(["%".$value."%"]);
        $users = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($row['username'], $row['password'], $row['role'], $row['employeeId']);
            $users[] = $user;
        }
        return $users;
    }

    public function deleteUserByEmployeeId($employeeId) {
        $query = "DELETE FROM users WHERE employeeId = :employeeId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':employeeId', $employeeId, PDO::PARAM_STR);
        return $stmt->execute();
    }
}