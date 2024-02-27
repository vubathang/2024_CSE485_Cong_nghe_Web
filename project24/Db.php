<?php

$users = [
    [
        "username" => "thangvb",
        "password" => password_hash("1234", PASSWORD_DEFAULT),
        "name" => "Thắng Vũ Bá",
        "email" => "thangvb.dev@gmail.com",
        "role" => "admin"
    ],
    [
        "username" => "huyentp",
        "password" => password_hash("huyentp", PASSWORD_DEFAULT),
        "name" => "Huyền Trịnh Phương",
        "email" => "huyentp@gmail.com",
        "role" => "admin"
    ],
    [
        "username" => "hoangnd",
        "password" => password_hash("hoangnd", PASSWORD_DEFAULT),
        "name" => "Hoàng Nguyễn Duy",
        "email" => "hoangnd@gmail.com",
        "role" => "admin"
    ],
    [
        "username" => "huydq",
        "password" => password_hash("huydq", PASSWORD_DEFAULT),
        "name" => "Huy Dương Quốc",
        "email" => "huydq@gmail.com",
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
];

class Db
{

}