<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!--    <link rel="stylesheet" href="assets/css/styles.css">-->
    <title>Document</title>
</head>
<body>
<div class="d-flex align-items-center justify-content-center" style="height: 100vh; background-color:#f6f6f6;">
    <form class="card py-3 px-5 bg-info bg-gradient" action="process_login.php" method="post" style="width: 400px;">
        <h1 class="fw-bold text-center">Login</h1>
        <b>Username:</b> <input type="text" name="username" required>
        <br>
        <b>Password:</b> <input type="password" name="password" required>
        <br>
        <button class="btn btn-success mb-3" type="submit">Login</button>
    </form>
</div>
</body>
</html>

