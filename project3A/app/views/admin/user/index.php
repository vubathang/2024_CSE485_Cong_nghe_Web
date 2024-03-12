<?php
// header('Location: '.DOMAIN.'?controller=department');
?>
<?php
$itemsPerPage = 5;
$currentPage = $_GET['page'] ?? ($_SESSION['currentPage'] ?? 1);
$_SESSION['currentPage'] = $currentPage;
$totalPages = isset($users) ? ceil(count($users) / $itemsPerPage) : 6;
$currentPageItems = array_slice($users, ($currentPage - 1) * $itemsPerPage, $itemsPerPage);
?>
<?php displayView('components/header');?>
<div class="container mt-5">
    <h1 class="text-center mb-2">Users</h1>
    <div class="d-flex justify-content-between my-3">
        <a href="<?= DOMAIN . '?controller=employee&action=create' ?>" class="btn btn-success">
            Create <i class="fas fa-plus"></i>
        </a>
        <form action="<?= DOMAIN . '?controller=user&action=search' ?>" method="post" class="d-flex">
            <label class="me-2">
                <input type="text" class="form-control" name="keyword" placeholder="Search">
            </label>
            <button type="submit" class="btn btn-outline-success">Search</button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered align-middle">
            <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">EmployeeId</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($currentPageItems)): foreach ($currentPageItems as $user): ?>
                <tr>
                    <th><?= $user->getUsername() ?></th>
                    <td><?= $user->getRole() ?></td>
                    <td><?= $user->getEmployeeId() ?></td>
                    <!-- <td class="d-flex justify-content-evenly">
                        <a href="<?= DOMAIN . '?controller=user&action=show&id=' . $user->getEmployeeId() ?>"
                           class="btn btn-outline-primary">
                            <i class="fas fa-circle-info"></i>
                        </a>
                        <a href="<?= DOMAIN . '?controller=user&action=edit&id='.$user->getEmployeeId() ?>"
                           class="btn btn-outline-warning">
                            <i class="fas fa-pen-to-square"></i>
                        </a>
                        <a href="<?= DOMAIN . '?controller=user&action=delete&id=' . $user->getEmployeeId() ?>"
                           class="btn btn-outline-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td> -->
                </tr>
            <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php if ($currentPage > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= DOMAIN . '?controller=user&action=index&page=' . ($currentPage - 1) ?>"
                       aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $currentPage === $i ? 'active' : '' ?>">
                    <a class="page-link" href="<?= DOMAIN . '?controller=user&action=index&page=' . $i ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>
            <?php if ($currentPage < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= DOMAIN . '?controller=user&action=index&page=' . ($currentPage + 1) ?>"
                       aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>