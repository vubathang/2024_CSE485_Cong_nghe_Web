<div class="container">
    <h3 class="text-center text-primary text-uppercase my-3">Employees Management</h3>
    <div class="row gap-3">
        <?php foreach ($employees as $employee){?>
            <div class="col-md-4 me-auto row rounded-3 shadow p-3" style="width: 350px">
                <div class="col-7">
                    <h5 class="card-title fst-italic mb-3">Digital Strategist</h5>
                    <p class="card-text fw-semibold my-1"><?= $employee->getFullName()?></p>
                    <p class="card-text"><?= $employee->getPosition()?></p>
                </div>
                <div class="col-5 text-center">
                    <img src="./assets/images/<?=$employee->getAvatar() ?>" alt="..." style="width: 70px">
                    <a href="<?= DOMAIN.'?controller=employee&action=show&id='.$employee->getEmployeeId()?>"
                       class="btn bg-info-subtle border border-info rounded-2 p-0" style="width: 100px; height: 30px">View profile</a>
                </div>
            </div>
        <?php }?>
    </div>
</div>
