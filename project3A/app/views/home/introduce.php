<section id="introduce">
    <h2 class="py-3 text-info"><?=$chaomung?></h2>
    <p class="fw-semibold"><?=$gioithieu?></p>
    <h2><?=$chatluong?></h2>
    <p><?=$chatluong2?></p>
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