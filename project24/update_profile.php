<?php
include_once 'Db.php';
session_start();

if (!isset($_SESSION['user_id']) || !isset($_COOKIE['logged_in'])) {
    header('Location: login.php');
}

$username = $_SESSION['user_id'];
$new_name = $_POST['name'];
$new_email = $_POST['email'];

// Find user and update their information (use prepared statements in real DB)
if (isset($users)) {
    foreach ($users as &$u) {
        if ($u['username'] === $username) {
            $u['name'] = $new_name;
            $u['email'] = $new_email;
            $db = new db();
            $db->updateUser($username, $new_name, $new_email);
            break;
        }
    }
}

header('Location: profile.php');