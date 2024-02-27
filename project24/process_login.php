<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
// Check if username exists and password matches (use prepared statements inreal DB)
$user_found = false;
require 'Db.php';
if(isset($users))
    foreach ($users as $u) {
        if ($u['username'] === $username && password_verify($password,
                $u['password'])) {
            $user_found = true;
            $_SESSION['user_id'] = $u['username'];
            $_SESSION['user_role'] = $u['role'];
            break;
        }
    }
if ($user_found) {
    setcookie('logged_in', true, time() + 60 * 60 * 24 * 30, "/"); // Setcookie for 30 days
               header('Location: profile.php');
} else {
    echo "Invalid username or password.";
    echo "<a href='login.php'>Login Again</a>";
}
?>
