<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include_once "Db.php";
?>
<div class="container mt-5">
    <form action="update_profile.php" method="post" enctype="multipart/form-data" class="form-pro border border-secondary p-3">
        <h2 class="text-center">Profile Information</h2>
        <?php if(isset($user)):?>
            <div class="text-center">
                <img src="<?= $user['avatar']?>" alt="<?= $user['name'] ?>" style="width: 100px;">
            </div>
            <label for="name" class="form-label mt-3 text-start fw-bold">Name</label>
            <input type="text" name="name" class="form-control" value="<?= $user['name'];?>" required>
            <label for="email" class="form-label mt-3 text-start fw-bold">Email</label>
            <input type="email" name="email" class="form-control" value="<?= $user['email'];?>">
            <label for="avatar" class="form-label mt-3 text-start fw-bold">Avatar</label>
            <input type="file" name="avatar" class="form-control" accept="image/*">
            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-3">Update profile</button>
            </div>
        <?php endif;?>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</body>
</html>