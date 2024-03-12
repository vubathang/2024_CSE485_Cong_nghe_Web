<section id="news-events" class="mt-5">
        <h2>Tin tức và sự kiện</h2>
        <div class="row py-3">
            <div class="col-6">
                <h5 class="text-danger"><i class="fa-solid fa-newspaper pe-3"></i>Tin tức</h5>
                <ul class="list-group list-group-flush">
                    <?php foreach ($news as $n):?>
                    <li class="list-group-item"><a class="text-decoration-none" href="">
                        <div class="card border-0 d-flex">
                            <div class="row g-0">
                                <div class="col-md-4">
                                <img src="<?=$n['url']?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <?=$n['title']?>
                                    </h5>
                                    <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; max-height: calc(1.5 * 1.2 * 3); line-height: 1.5rem;">
                                        <?=$n['content']?>
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </a></li>
                    <?php endforeach ?>
                </ul>
                <a href="">Xem tất cả >>></a>
            </div>
            <div class="col-6">
                <h5 class="text-danger"><i class="fa-solid fa-calendar-days pe-3"></i>Sự kiện</h5>
                <ul class="list-group list-group-flush">
                <?php foreach ($events as $n):?>
                    <li class="list-group-item"><a class="text-decoration-none" href="">
                        <div class="card border-0 d-flex">
                            <div class="row g-0">
                                <div class="col-md-4">
                                <img src="<?=$n['url']?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <?=$n['title']?>
                                    </h5>
                                    <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; max-height: calc(1.5 * 1.2 * 3); line-height: 1.5rem;">
                                        <?=$n['content']?>
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </a></li>
                    <?php endforeach ?>
                </ul>
                <a href="">Xem tất cả >>></a>
            </div>
        </div>
    </section>