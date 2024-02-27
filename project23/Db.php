<?php
$users = [
    [
        "username" => "johndoe",
        "password" => password_hash("password123", PASSWORD_DEFAULT),
        "name" => "John Doe",
        "email" => "johndoe@example.com"
    ],
    [
        "username" => "janedoe",
        "password" => password_hash("password456", PASSWORD_DEFAULT),
        "name" => "Jane Doe",
        "email" => "janedoe@example.com"
    ],
    [
        "username" => "robertsmith",
        "password" => password_hash("password789", PASSWORD_DEFAULT),
        "name" => "Robert Smith",
        "email" => "robertsmith@example.com"
    ],
    [
        "username" => "emilyjohnson",
        "password" => password_hash("password321", PASSWORD_DEFAULT),
        "name" => "Emily Johnson",
        "email" => "emilyjohnson@example.com"
    ]
];
class Db
{

}