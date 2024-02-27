<?php
include_once 'Db.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Check if username exists and password matches (use prepared statements in real DB)
$user_found = false;
if (isset($users)) {
    foreach ($users as $u) {
        if ($u['username'] === $username && password_verify($password, $u['password'])) {
            $user_found = true;
            $_SESSION['user_id'] = $u['username'];
            $_SESSION['user_role'] = $u['role'];
            break;
        }
    }
} 

if ($user_found) {
    setcookie('logged_in', true, time() + 60 * 60 * 24 * 30, "/"); // Set cookie for 30 days
    header('Location: profile.php');
} else {
    $_SESSION['error'] = "Incorrect username or password";
    header('Location: login.php');
}