<?php
include_once 'Db.php';
session_start();

if (!isset($_SESSION['user_id']) || !isset($_COOKIE['logged_in'])) {
    header('Location: login.php');
}

$username = $_SESSION['user_id'];

$user = null;
if (isset($users)) {
    foreach ($users as $u) {
        if ($u['username'] === $username) {
            $user = $u;
            break;
        }
    }
}

if ($user) {
    echo "Welcome, " . $user['name'] . "!";
    echo "<br>Email: " . $user['email'];
} else {
    echo "Error: User not found.";
}