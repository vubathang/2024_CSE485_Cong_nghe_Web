<?php
require 'form.php';
require 'Db.php';
$errors = [
    '1' => "Only JPG, JPEG, and PNG files are allowed.",
    '2' => "File size must be less than 1MB."
];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Thực hành 2.2</title>
    <style>
        /* The alert message box */
        .alert {
            padding: 20px;
            background-color: #f44336; /* Red */
            color: white;
            margin-bottom: 15px;
        }

        /* The close button */
        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        /* When moving the mouse over the close button */
        .closebtn:hover {
            color: black;
        }

        .alert {
            opacity: 1;
            transition: opacity 0.6s; /* 600ms to fade out */
        }
    </style>
</head>
<body>
    <?php if(isset($_GET['error'])):?>
    <div class="alert" style="position: absolute; top: 20px;z-index: 100">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?=$errors[$_GET['error']]?>
    </div>
    <?php endif;?>
    <?php echo isset($user) ? getForm($user) : "<h1>No user</h1>"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Get all elements with class="closebtn"
        var close = document.getElementsByClassName("closebtn");
        var i;

        // Loop through all close buttons
        for (i = 0; i < close.length; i++) {
            // When someone clicks on a close button
            close[i].onclick = function(){

                // Get the parent of <span class="closebtn"> (<div class="alert">)
                var div = this.parentElement;

                // Set the opacity of div to 0 (transparent)
                div.style.opacity = "0";

                // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
                setTimeout(function(){ div.style.display = "none"; }, 600);
            }
        }
    </script>
</body>
</html>