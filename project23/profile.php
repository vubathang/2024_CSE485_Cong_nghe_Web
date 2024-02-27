<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_COOKIE['logged_in'])) {
    header('Location: login.php'); // Redirect to login if not authenticated
}
$username = $_SESSION['user_id'];
require 'Db.php';
$user = null;
if(isset($users))
    foreach ($users as $u)
        if ($u['username'] === $username) {
            $user = $u;
            break;
        }
if ($user) {
    echo "Welcome, " . $user['name'] . "!";
    echo "<br>Email: " . $user['email'];
    echo "<br><a href='logout.php'>Logout</a>";
} else {
    echo "Error: User not found.";
    echo "<a href='index.php'>Return Login</a>";
}
?>