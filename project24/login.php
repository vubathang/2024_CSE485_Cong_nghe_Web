<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<form action="process_login.php" method="post">
    <div class=" container mt-3" >
        <div class="row ">
            <div class="col-md-5 col-8 mx-auto rounded bg-white rounded-4">
                <div class="image-top">
                    <img src="assets/image/top_background.png" alt="">
                </div>
                <div class="content">
                    <img src="assets/image/logo.png" alt="" class="w-75">
                    <input type="text" name="username" placeholder="Username" class="text-center rounded-4 border border-dark-subtle border-2" required>
                    <br>
                    <input type="password" name="password" placeholder="Password" class="text-center rounded-4 border border-dark-subtle border-2" required>
                    <br>
                    <button type="submit" class="text-center rounded-4 bg-info-subtle border border-info">Login</button>
                </div>
                <div class="image-bottom">
                    <img src="assets/image/bottom_background.png" alt="" class="">
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>