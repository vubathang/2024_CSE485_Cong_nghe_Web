<?php

class UserService {
    private $conn;

    public function __construct() {
        loadModel('User');
        $this->conn = getConn();
    }

    public function getUserByUsername($username) {
        $query = "SELECT * FROM `users` WHERE username = :username";
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
        $query = "SELECT * FROM `users` WHERE employeeId = :employeeId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':employeeId', $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = null;
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($row['username'], $row['password'], $row['role'], $row['employeeId']);
        }
        return $user;
    }
}