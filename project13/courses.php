<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách khóa học</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <h2 class="title">KHÓA HỌC SẮP KHAI GIẢNG</h2>
    <?php
    include_once "db.php";

    echo "<div class='course-list'>";
    if (!empty($courses)) {
        foreach ($courses as $course) {
            echo "<div class='course-item'>";
            echo "<img src='$course[img]' alt='$course[title]' class='course-img'>";
            echo "<h4 class='course-title'>$course[title]</h4>";
            echo "<p class='course-desc'>$course[description]</p>";
            echo "<p>Học phí: $course[fee]</p>";
            echo "<p>Khai giảng: $course[start_date]</p>";
            echo "<p>Thời lượng: $course[duration]</p>";
            echo "</div>";
        }
    }
    echo "</div>";?>
</div>
</body>
</html>