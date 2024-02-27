<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_COOKIE['logged_in']) ||
    $_SESSION['user_role'] !== "admin") {
    header('Location: login.php');
}

$username = $_POST['username'];
$new_name = $_POST['name'];
$new_email = $_POST['email'];

// Find user and update their information
if (isset($_SESSION['users'])) {
    foreach ($_SESSION['users'] as &$u) {
        if ($u['username'] === $username) {
            $u['name'] = $new_name;
            $u['email'] = $new_email;
            break;
        }
    }
}

// Save the updated users array to the session
if (isset($users)) {
    $_SESSION['users'] = $users;
}

header('Location: admin_panel.php');