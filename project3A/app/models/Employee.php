<?php

class Employee {
  private $employeeId;
  private $fullName;
  private $address;
  private $email;
  private $phone;
  private $position;
  private $avatar;
  private $departmentId;
//  private $departmentName;

    public function __construct($employeeId, $fullName, $address, $email, $phone, $position, $avatar, $departmentId) {
        $this->employeeId = $employeeId;
        $this->fullName = $fullName;
        $this->address = $address;
        $this->email = $email;
        $this->phone = $phone;
        $this->position = $position;
        $this->avatar = $avatar;
        $this->departmentId = $departmentId;
//        $this->departmentName = $departmentName;
    }

    public function getEmployeeId() {
        return $this->employeeId;
    }
    public function getFullName() {
        return $this->fullName;
    }
    public function getAddress() {
        return $this->address;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPhone() {
        return $this->phone;
    }
    public function getPosition() {
        return $this->position;
    }
    public function getAvatar() {
        return $this->avatar;
    }
    public function setEmployeeId($employeeId) {
        $this->employeeId = $employeeId;
    }
    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }
    public function setAddress($address) {
        $this->address = $address;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setPhone($phone) {
        $this->phone = $phone;
    }
    public function setPosition($position) {
        $this->position = $position;
    }
    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }
    public function getDepartmentId() {
        return $this->departmentId;
    }

}