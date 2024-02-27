<?php
define('ROOT', __DIR__);
$users = [
    [
        "username" => "johndoe",
        "password" => password_hash("password123", PASSWORD_DEFAULT),
        "name" => "John Doe",
        "email" => "johndoe@example.com"
    ],
    [
        "username" => "thangvb",
        "password" => password_hash("1234", PASSWORD_DEFAULT),
        "name" => "Thắng Vũ Bá",
        "email" => "thangvb.dev@gmail.com"
     ],
];
class Db
{

}