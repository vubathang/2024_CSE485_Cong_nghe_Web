<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project 12</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<?php
    include "db.php";
echo '<nav><ul>';
echo"<li><i class='fa-solid fa-house' style='color: #ffffff;'></i></li>";
foreach ($navItems as $item){
//
    $subItems = [];
    foreach ($navItems as $child){
        if($child["parent"] == $item["id"]) $subItems[] = $child;
    }
    if($item["parent"] === 'null'){
        if(count($subItems)==0) echo '<li>'.$item["title"].'</li>';
        else{
            echo '<li class="dropdown">';
                echo "<a class= 'show' href='".$item["url"]."'>".$item["title"]."</a>";
                echo '<div class="dropdown-content">';
                    foreach ($subItems as $subItem){
                        echo "<a href='".$subItem["url"]."'>".$subItem["title"]."</a>";
                    }
                echo '</div>';
            echo '</li>';
        }
    }
}
echo '</ul></nav>';
?>
</body>
</html>



