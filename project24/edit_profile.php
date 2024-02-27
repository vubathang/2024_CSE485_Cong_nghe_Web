<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
?>
<?php if ($user): ?>
<div class="container mt-5">
    <form action="update_profile.php" method="post" enctype="multipart/form-data" class="form-pro border border-secondary p-3">
        <h3 class="text-center">Profile Information</h3>
        <label for="name" class="form-label mt-3 text-start fw-bold">Name</label>
        <input type="text" name="name" class="form-control" value="<?= $user['name'];?>">
        <label for="email" class="form-label mt-3 text-start fw-bold">Email</label>
        <input type="email" name="email" class="form-control" value="<?= $user['email'];?>">
        <div class="text-center">
            <button type="submit" class="btn btn-primary mt-3">Update profile</button>
        </div>
    </form>
</div>
<?php else: echo "Error: User not found."; endif; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</body>
</html>