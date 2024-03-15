<?php
$itemsPerPage = 8;
$currentPage = $_GET['page'] ?? ($_SESSION['currentPage'] ?? 1);
$_SESSION['currentPage'] = $currentPage;
$totalPages = isset($employees) ? ceil(count($employees) / $itemsPerPage) : 6;
$currentPageItems = array_slice($employees, ($currentPage - 1) * $itemsPerPage, $itemsPerPage);
?>
<?php displayView('components/header')?>
<div class="container mt-5">
    <h3 class="text-center text-primary text-uppercase my-3">Thông tin nhân viên</h3>
    <div class="row">
        <?php if (isset($currentPageItems)):
            foreach ($currentPageItems as $employee):?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 my-3">
                    <div class="card rounded-3 shadow p-3">
                        <?php
                            $avatar = $employee->getAvatar();
                            if (!file_exists($avatar)) {
                                $avatar = './assets/images/default.png';
                            }
                        ?> 
                        <div class="d-flex align-items-center">
                            <img src="<?= $avatar ?>" class="me-3" style="height: 32px; width: 32px;" alt="<?= $employee->getFullName() ?>">
                            <h5 class="" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" ><?= $employee->getFullName()?></h5>
                        </div>
                        <!-- <p class="card-text"><strong>Name:</strong> <?= $employee->getFullName() ?></p> -->
                        <p class="card-text mb-1" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" ><strong>Vị trí:</strong> <?= $employee->getPosition() ?></p>
                        <!-- <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><strong>Email:</strong> <?= $employee->getEmail() ?></p> -->
                        <!-- <p class="card-text"><strong>Phone:</strong> <?= $employee->getPhone() ?></p> -->
                        <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" ><strong>Cơ quan:</strong> <?= $employee->getDepartmentName() ?></p>
                        <a href="<?= DOMAIN.'?controller=employee&action=show&id='.$employee->getEmployeeId()?>"
                           class="btn bg-info-subtle border border-info rounded-2 fw-semibold">Chi tiết</a>
                    </div>
                </div>
            <?php endforeach; endif; ?>
    </div>
    <div class="mt-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if ($currentPage > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= DOMAIN . '?controller=employee&action=index&page=' . ($currentPage - 1) ?>"
                           aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= $currentPage === $i ? 'active' : '' ?>">
                        <a class="page-link" href="<?= DOMAIN . '?controller=employee&action=index&page=' . $i ?>">
                            <?= $i ?>
                        </a>
                    </li>
                <?php endfor; ?>
                <?php if ($currentPage < $totalPages): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= DOMAIN . '?controller=employee&action=index&page=' . ($currentPage + 1) ?>"
                           aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>