<?php
require 'db.php';
foreach ($courses as $course):
    $thumb = './assets/image/'.$course['thumb'];
?>
    <div class="card course col-xl-3 col-md-5 col-12 mx-auto">
        <img src='<?=$thumb ?>' class="card-img-top" alt="image">
        <div class="card-body">
            <h5 class="card-title"><?=$course['title'] ?></h5>
            <p class="card-text"><?=$course['desc'] ?></p>
        </div>
        <ul class="px-1">
            <li class=""><i class="fa-solid fa-clock pe-2" style="color: #b81425;"></i><?=$course['offer']?></li>
            <li class=""><i class="fa-solid fa-gift" style="color: #d41620;"></i> Khai giảng <?=$course['start_date']?></li>
            <li class=""><i class="fa-solid fa-gift" style="color: #cd0e51;"></i> Thời lượng <?=$course['duration']?></li>
        </ul>
    </div>
<?php endforeach; ?>
