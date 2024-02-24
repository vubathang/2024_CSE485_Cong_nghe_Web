<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thanh điều hướng</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php
include_once "db.php";

echo "<nav><ul class='nav-list'>";
if (!empty($navItems)) {
    foreach ($navItems as $item) {
        echo "<li class='nav-item'>";
        echo "<a href='#' class='nav-link'>$item[name]</a>";
        if (!empty($item['subItems'])) {
            echo "<ul class='sub-nav-list'>";
            foreach ($item['subItems'] as $subItem) {
                echo "<li class='sub-nav-item'><a href='#' class='sub-nav-link'>$subItem</a></li>";
            }
            echo "</ul>";
        }
        echo "</li>";
    }
}
echo "</ul></nav>";
?>
</body>
</html>