<?php
    $itemsPerPage = 5;
    session_start();
    $currentPage = $_GET['page'] ?? ($_SESSION['currentPage'] ?? 1);
    $_SESSION['currentPage'] = $currentPage;
    $totalPages = isset($departments) ? ceil(count($departments) / $itemsPerPage) : 6;
    $currentPageItems = array_slice($departments, ($currentPage - 1) * $itemsPerPage, $itemsPerPage);
?>
<div class="container mt-5">
    <h1 class="text-center mb-2">Departments</h1>
    <div class="d-flex justify-content-between my-3">
        <a href="<?= DOMAIN . '?controller=department&action=create' ?>" class="btn btn-success">
            Create <i class="fas fa-plus"></i>
        </a>
        <form action="<?= DOMAIN . '?controller=department&action=search' ?>" method="post" class="d-flex">
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
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Parent Department</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($currentPageItems)): foreach ($currentPageItems as $department): ?>
                <tr>
                    <td><?= $department->getDepartmentId() ?></td>
                    <td><?= $department->getDepartmentName() ?></td>
                    <td><?= $department->getAddress() ?></td>
                    <td><?= $department->getEmail() ?></td>
                    <td><?= $department->getPhone() ?></td>
                    <td><?= $department->getParentDepartmentName() ?></td>
                    <td class="d-flex justify-content-evenly">
                        <a href="<?= DOMAIN . '?controller=department&action=show&id=' . $department->getDepartmentId() ?>"
                           class="btn btn-outline-primary">
                            <i class="fas fa-circle-info"></i>
                        </a>
                        <a href="<?= DOMAIN . '?controller=department&action=edit&id=' . $department->getDepartmentId() ?>"
                           class="btn btn-outline-warning">
                            <i class="fas fa-pen-to-square"></i>
                        </a>
                        <a href="<?= DOMAIN . '?controller=department&action=delete&id=' . $department->getDepartmentId() ?>"
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
                    <a class="page-link" href="<?= DOMAIN . '?controller=department&action=index&page=' . ($currentPage - 1) ?>"
                       aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $currentPage === $i ? 'active' : '' ?>">
                    <a class="page-link" href="<?= DOMAIN . '?controller=department&action=index&page=' . $i ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>
            <?php if ($currentPage < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= DOMAIN . '?controller=department&action=index&page=' . ($currentPage + 1) ?>"
                       aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>