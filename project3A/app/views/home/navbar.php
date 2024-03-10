<?php
    $nav = [
        [
            'id' => 1,
            'title' => 'Giới thiệu',
            'url' => '#'
        ],
        [
            'id' => 2,
            'title' => 'Tin tức & Sự kiện',
            'url' => '#news-events'
        ],
        [
            'id' => 3,
            'title' => 'Liên hệ',
            'url' => '#contact'
        ]
    ]
?>

<ul class="nav justify-content-center px-3 py-5">
    <?php foreach($nav as $n): ?>
    <li class="nav-item">
        <a class="nav-link fw-bold fs-4 text-secondary" href="<?=$n['url']?>"><?=$n['title']?></a>
    </li>
    <?php endforeach; ?>
</ul>