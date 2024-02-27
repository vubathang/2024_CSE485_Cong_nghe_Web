<?php
require 'Db.php';
session_start();
if (!isset($_SESSION['user_id']) || !isset($_COOKIE['logged_in']) ||
    $_SESSION['user_role'] !== "admin") {
    header('Location: login.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Admin Panel</title>
</head>
<body style="background-color:#f6f6f6;">
    <div class="container mt-5">
        <h1 class="text-secondary fw-bold">USERS</h1>
        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($users)): foreach ($users as $u): ?>
            <tr class="py-3">
                <th scope="row"><?=$u['username']?></th>
                <td><?=$u['name']?></td>
                <td><?=$u['email']?></td>
                <td><?=$u['role']?></td>
                <td>
                    <?php if($u['username'] === $_SESSION['user_id']):?>
                    <a class="btn btn-info" href='profile.php' style="width: 70px;">Profile</a>
                    <?php else: ?>
                    <a class="btn btn-success" href='edit_user.php?username=<?=$u['username']?>' style="width: 70px;">Edit</a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
