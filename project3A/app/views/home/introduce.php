<?php
    $chaomung = 'Chào Mừng Bạn Đến với Trang Web Tra Cứu Danh Bạ Điện Tử của Đại Học Thủy Lợi!';
    $gioithieu = 'Chúng tôi với niềm vinh dự và lòng tự hào chào đón bạn đến với nền tảng tra cứu danh bạ điện tử độc đáo của Đại Học Thủy Lợi. Được thành lập trên cơ sở hơn một thế kỷ của truyền thống giáo dục, chúng tôi cam kết đem đến cho bạn một trải nghiệm tìm kiếm thông tin hiện đại, thuận tiện, và hoàn toàn linh hoạt.';
    $chatluong = 'Chất Lượng Học Việc và Đội Ngũ Chuyên Gia:';
    $chatluong2 = 'Đại Học Thủy Lợi là một trung tâm học thuật nổi tiếng, và danh bạ điện tử của chúng tôi là nguồn thông tin đáng tin cậy về cộng đồng học thuật và nhân sự. Với đội ngũ cán bộ, giảng viên, và nhân viên đầy đủ chuyên môn và tận tâm, chúng tôi cam kết cung cấp cho bạn một cổng thông tin chất lượng và đầy đủ.';
    $tinhnangdacbiet = 'Tính Năng Nổi Bật:';
?>

<section id="introduce">
    <h2 class="py-3 text-dark"><?=$chaomung?></h2>
    <p class="fw-semibold text-secondary"><?=$gioithieu?></p>
    <h2 class="py-3 text-dark"><?=$chatluong?></h2>
    <p class="fw-semibold text-secondary"><?=$chatluong2?></p>
    <h2 class="text-danger"><?=$tinhnangdacbiet?></h2>
    <div class="accordion" id="accordionExample">
        <div class="accordion" id="accordionExample">
        <?php foreach($specialFeatures as $sf): ?>
            <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$sf['id']?>" aria-expanded="true" aria-controls="collapse<?=$sf['id']?>">
                    <?=$sf['title']?>
                </button>
            </h2>
            <div id="collapse<?=$sf['id']?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?=$sf['content']?>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</section>