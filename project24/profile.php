<?php
include_once 'Db.php';
session_start();

if (!isset($_SESSION['user_id']) || !isset($_COOKIE['logged_in'])) {
    header('Location: login.php');
}

$username = $_SESSION['user_id'];
$user = null;

// Retrieve user data based on username (use prepared statements in real DB)
if (isset($users)) {
    foreach ($users as $u) {
        if ($u['username'] === $username) {
            $user = $u;
            break;
        }
    }
}

if ($user) {
    // Display user information based on authorization level
    $user_role = $_SESSION['user_role'];

    echo "Welcome, " . $user['name'] . "!";
    echo "<br>Email: " . $user['email'];

    if (isset($authorization_levels)) {
        if ($authorization_levels[$user_role]['edit_profile']) {
            echo "<br><a href='edit_profile.php'>Edit basic profile information</a>";
        }
        if ($user_role === "admin" &&
            $authorization_levels[$user_role]['access_admin_panel']) {
            echo "<br><a href='./admin/admin_panel.php'>Admin Panel</a>";
        }
    }

} else {
    echo "Error: User not found.";
}