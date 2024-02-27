<?php
session_start();

session_destroy();
setcookie('logged_in', "", 1, "/"); // Expire cookie

header('Location: login.php');