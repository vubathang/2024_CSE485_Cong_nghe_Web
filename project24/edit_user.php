<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_COOKIE['logged_in']) ||
    $_SESSION['user_role'] !== "admin") {
    header('Location: login.php');
}
$username = $_GET['username'];

require 'Db.php';
$user = null;
if(isset($users))
    foreach ($users as $u)
        if ($u['username'] === $username) {
            $user = $u;
            break;
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
    <title>Edit User</title>
</head>
<body style="background-color:#f6f6f6;">
    <div class="container mt-5">
        <h1 class="text-secondary fw-bold">EDIT USER</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin_panel.php">Admin Panel</a></li>
                <li class="breadcrumb-item active" aria-current="Edit User">Edit User</li>
            </ol>
        </nav>
        <form class="pt-5 pb-5 position-relative" action="process_edit_user.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label fw-bold">Username</label>
                <input type="text" class="form-control" id="username" value="<?=$user['username']?>" disabled>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="name" value="<?=$user['name']?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" class="form-control" id="email" value="<?=$user['email']?>" disabled>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label fw-bold">Role</label>
                <?php
                    $adminRole = null;
                    $userRole= null;
                    if($user['role'] == 'admin') $adminRole = 'selected';
                    else $userRole = 'selected';
                ?>
                <select class="form-control" id="role">
                    <option <?=$adminRole?> value="admin">Admin</option>
                    <option <?=$userRole?> value="user">User</option>
                </select>
            </div>
            <button class="btn btn-success position-absolute end-0" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
