<?php
    include 'db.php'
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>>Danh sách khóa học</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="container-fluid ">
        <p class="border-start border-danger border-2 fw-bold px-2 text-uppercase text-danger">Khóa học sắp khai giảng</p>
        <div class="news-card px-1 d-flex justify-content-between flex-wrap">
            <?php
            foreach ($courses as $course) {
//        echo '<div class="course">';
                echo '<div class="card-style" style = "width: 380px; height: 450px">';
                    echo "<img src='".$course["image"]."' class='card-img-top'>";
                    echo '<div class="card-body">';
                        echo '<div class="general_info mt-3" style="height: 120px">';
                            echo '<h5 class="card-title text-uppercase fs-6 fw-bolder">'.$course['title'].'</h5>';
                            echo '<p class="card-text mt-3" style="font-size: 15px">'.$course['description'].'</p>';
                        echo '</div>';
                        echo '<p><i class="fas fa-gift me-2 text-danger"></i>Học phí: ' . $course['fee'] . '</p>';
                        echo '<p><i class="fas fa-clock me-2 text-danger"></i>Khai giảng: ' . $course['start_date'] . '</p>';
                        echo '<p><i class="fas fa-bookmark me-2 text-danger"></i>Thời lượng: ' . $course['duration'] . '</p>';
                    echo '</div>';
                echo '</div>';
            }
            ?>

        </div>
    </div>

</body>
</html>