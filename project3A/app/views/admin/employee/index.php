<?php
$itemsPerPage = 5;
$currentPage = $_GET['page'] ?? ($_SESSION['currentPage'] ?? 1);
$_SESSION['currentPage'] = $currentPage;
$totalPages = isset($employees) ? ceil(count($employees) / $itemsPerPage) : 6;
$currentPageItems = array_slice($employees, ($currentPage - 1) * $itemsPerPage, $itemsPerPage);
?>
<?php displayView('components/header');?>
<div class="container mt-5">
    <h1 class="text-center mb-2">Employees</h1>
    <div class="d-flex justify-content-between my-3">
        <a href="<?= DOMAIN . '?controller=employee&action=create' ?>" class="btn btn-success">
            Create <i class="fas fa-plus"></i>
        </a>
        <form action="<?= DOMAIN . '?controller=employee&action=search' ?>" method="post" class="d-flex">
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
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Position</th>
                <th scope="col">Avatar</th>
                <th scope="col">Department</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($currentPageItems)): foreach ($currentPageItems as $employee): ?>
                <tr>
                    <td><?= $employee->getEmployeeId() ?></td>
                    <td><?= $employee->getFullName() ?></td>
                    <td><?= $employee->getAddress() ?></td>
                    <td><?= $employee->getEmail() ?></td>
                    <td><?= $employee->getPhone() ?></td>
                    <td><?= $employee->getPosition() ?></td>
                    <td><?= $employee->getAvatar() ?></td>
                    <td><?= $employee->getDepartmentName() ?></td>
                    <td class="d-flex justify-content-evenly">
                        <a href="<?= DOMAIN . '?controller=employee&action=show&id=' . $employee->getEmployeeId() ?>"
                           class="btn btn-outline-primary">
                            <i class="fas fa-circle-info"></i>
                        </a>
                        <a href="<?= DOMAIN . '?controller=employee&action=edit&id=' . $employee->getEmployeeId() ?>"
                           class="btn btn-outline-warning">
                            <i class="fas fa-pen-to-square"></i>
                        </a>
                        <a href="<?= DOMAIN . '?controller=employee&action=delete&id=' . $employee->getEmployeeId() ?>"
                           class="btn btn-outline-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
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