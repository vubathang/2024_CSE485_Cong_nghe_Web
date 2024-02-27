<?php
$users = [
    [
        "username" => "johndoe",
        "password" => password_hash("123", PASSWORD_DEFAULT),
        "name" => "John Doe",
        "email" => "johndoe@example.com",
        "role" => "user"
    ],
    [
        "username" => "janedoe",
        "password" => password_hash("456", PASSWORD_DEFAULT),
        "name" => "Jane Doe",
        "email" => "janedoe@example.com",
        "role" => "admin"
    ],
    [
        "username" => "huyentp",
        "password" => password_hash("abc", PASSWORD_DEFAULT), // Store hashe password
        "name" => "Huyen Trinh",
        "email" => "huyentp@example.com",
        "role" => "user"
    ],
    [
        "username" => "quynn",
        "password" => password_hash("def", PASSWORD_DEFAULT), // Store hashe password
        "name" => "Quynh Nguyen",
        "email" => "quynhnguyen@example.com",
        "role" => "user"
    ]
];
$authorization_levels = [
    "user" => [
        "access_profile" => true,
        "edit_profile" => true,
        "access_admin_panel" => false,
    ],
    "admin" => [
        "access_profile" => true,
        "edit_profile" => true,
        "access_admin_panel" => true,
        "manage_users" => true,
    ],
    // ... add more levels
];

//class Db
//{
//
//}