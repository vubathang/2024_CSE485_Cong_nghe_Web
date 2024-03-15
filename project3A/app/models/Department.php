<?php

class Department
{
    private $departmentId;
    private $departmentName;
    private $address;
    private $email;
    private $phone;
    private $parentDepartmentId;
    private $parentDepartmentName;

    public function __construct($departmentId, $departmentName, $address, $email, $phone, $parentDepartmentId, $parentDepartmentName = 'N/A')
    {
        $this->departmentId = $departmentId;
        $this->departmentName = $departmentName;
        $this->address = $address;
        $this->email = $email;
        $this->phone = $phone;
        $this->parentDepartmentId = $parentDepartmentId;
        $this->parentDepartmentName = $parentDepartmentName;
    }

    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;
    }

    public function getDepartmentName()
    {
        return $this->departmentName;
    }

    public function setDepartmentName($departmentName)
    {
        $this->departmentName = $departmentName;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getParentDepartmentId()
    {
        return $this->parentDepartmentId;
    }

    public function getParentDepartmentName()
    {
        return $this->parentDepartmentName ?: 'N/A';
    }
}