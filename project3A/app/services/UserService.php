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

    public function register($username, $password, $role, $employeeId) {
        $query = "INSERT INTO `".self::TABLE_NAME."` (username, password, role, employeeId) VALUES (:username, :password, :role, :employeeId)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->bindParam(':employeeId', $employeeId, PDO::PARAM_INT);
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateUser($username, $password) {
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
}