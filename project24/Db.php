<?php
$users = [
    [
        "username" => "johndoe",
        "password" => password_hash("password123", PASSWORD_DEFAULT),
        "name" => "John Doe",
        "email" => "johndoe@example.com",
        "role" => "admin"
    ],
    [
        "username" => "janedoe",
        "password" => password_hash("password456", PASSWORD_DEFAULT),
        "name" => "Jane Doe",
        "email" => "janedoe@example.com",
        "role" => "user"
    ],
    [
        "username" => "robertsmith",
        "password" => password_hash("password789", PASSWORD_DEFAULT),
        "name" => "Robert Smith",
        "email" => "robertsmith@example.com",
        "role" => "user"
    ],
    [
        "username" => "emilyjohnson",
        "password" => password_hash("password321", PASSWORD_DEFAULT),
        "name" => "Emily Johnson",
        "email" => "emilyjohnson@example.com",
        "role" => "user"
    ],
    [
        "username" => "michaeljackson",
        "password" => password_hash("password654", PASSWORD_DEFAULT),
        "name" => "Michael Jackson",
        "email" => "michaeljackson@example.com",
        "role" => "user"
    ],
    [
        "username" => "user1",
        "password" => password_hash("password1", PASSWORD_DEFAULT),
        "name" => "User One",
        "email" => "user1@example.com",
        "role" => "user"
    ],
    [
        "username" => "user2",
        "password" => password_hash("password2", PASSWORD_DEFAULT),
        "name" => "User Two",
        "email" => "user2@example.com",
        "role" => "user"
    ],
    [
        "username" => "user3",
        "password" => password_hash("password3", PASSWORD_DEFAULT),
        "name" => "User Three",
        "email" => "user3@example.com",
        "role" => "user"
    ],
    [
        "username" => "user4",
        "password" => password_hash("password4", PASSWORD_DEFAULT),
        "name" => "User Four",
        "email" => "user4@example.com",
        "role" => "user"
    ],
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
    ]
];
class Db
{
    public function updateUser($username, $new_name, $new_email): void
    {
        $sql = "UPDATE users SET name = ?, email = ? WHERE username = ?";
        if (isset($this->conn)) {
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sss", $new_name, $new_email, $username);
            $stmt->execute();
        }
    }
}