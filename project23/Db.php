<?php
$users = [
    [
        "username" => "johndoe",
        "password" => password_hash("123", PASSWORD_DEFAULT), // Store hashe password
        "name" => "John Doe",
        "email" => "johndoe@example.com"
    ],
    [
        "username" => "huyentp",
        "password" => password_hash("abc", PASSWORD_DEFAULT), // Store hashe password
        "name" => "Huyen Trinh",
        "email" => "huyentp@example.com"
    ],
    [
        "username" => "quynn",
        "password" => password_hash("456", PASSWORD_DEFAULT), // Store hashe password
        "name" => "Quynh Nguyen",
        "email" => "quynhnguyen@example.com"
    ]
];
class Db
{

}