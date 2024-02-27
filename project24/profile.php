<?php
require 'Db.php';
session_start();
if (!isset($_SESSION['user_id']) || !isset($_COOKIE['logged_in'])) {
    header('Location: login.php');
}
$username = $_SESSION['user_id'];
$user = null;
if(isset($users))
    foreach ($users as $u) {
        if ($u['username'] === $username) {
            $user = $u;
            break;
        }
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
    <title>Profile</title>
</head>
<body style="background-color:#f6f6f6;">
    <div class="container" >
        <?php if($user): $user_role = $_SESSION['user_role'];?>
            <div class="d-flex justify-content-between">
                <div>
                    <h1>Welcome <?=$user['name']?>!</h1>
                    <h6 class="fst-italic">Email: <?=$user['email']?> !</h6>
                </div>
                <div class="d-flex align-item-center">
                <?php if (isset($authorization_levels) && $authorization_levels[$user_role]['edit_profile']):?>
                    <a href="admin_panel.php" class="btn btn-info my-auto me-4">Admin Panle</a>
                <?php endif;?>
                    <a href="logout.php" class="btn btn-danger my-auto">Logout</a>
                </div>
            </div>
        <?php else: ?>
            <h1 class="text-danger">Error: User not found.</h1>
        <?php endif;?>
    </div>
</body>
</html>