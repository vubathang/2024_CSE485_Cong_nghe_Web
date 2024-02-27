<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<form action="process_login.php" method="post">
    <div class="container my-3" >
        <div class="row pt-5">
            <div class="col-md-4 col-9 mx-auto rounded-5 bg-white border border-2 shadow-lg pb-4">
                <div class="text-center">
<!--                    <p class="fs-3 fw-bold text-dark">Login</p>-->
<!--                    <p><i class="fas fa-smile fa-2x text-warning"></i></p>-->
                    <img src="assets/image/Untitled-2.png" class="border border-0 w-75" alt="">
                </div>
                <div class="form-group">
                    <div class="input mx-2 mt-3">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="username" required placeholder="UserName" class="rounded-3 ps-4" style="width: 320px;">
                    </div>
                    <br>
                    <div class="input mx-2">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" required placeholder="Password" class="rounded-2 ps-4" style="width: 320px;">
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="bg-warning border-0 rounded-5 text-bg-primary fw-medium" style="width: 150px;">Log In</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

</body>
</html>