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
<div class="container mt-5">
    <form action="process_login.php" method="post" enctype="multipart/form-data" class="form-pro border border-secondary p-3">
    <h3 class="text-center mb-2">Login</h3>
        <label for="username" class="form-label fw-bold">Username</label>
        <input type="text" name="username" class="form-control" required>
        <label for="username" class="form-label mt-3 fw-bold">Password</label>
        <input type="password" name="password" class="form-control" required>
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo "<span class='text-danger fw-bold mt-2'>".$_SESSION['error']."</span>";
            unset($_SESSION['error']);
        }
        ?>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</body>
</html>