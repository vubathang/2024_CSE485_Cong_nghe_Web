<?php
// header('Location: '.DOMAIN.'?controller=department');
?>
<?php
$itemsPerPage = 5;
$currentPage = $_GET['page'] ?? ($_SESSION['currentPage'] ?? 1);
$_SESSION['currentPage'] = $currentPage;
$totalPages = isset($users) ? ceil(count($users) / $itemsPerPage) : 6;
$currentPageItems = array_slice($users, ($currentPage - 1) * $itemsPerPage, $itemsPerPage);
if (count($currentPageItems) == 0) {
    $currentPageItems = $users;
}
?>
<?php displayView('components/header');?>
<div class="container mt-5">
    <h1 class="text-center mb-2">Người dùng</h1>
    <div class="d-flex justify-content-between my-3">
        <form action="#" method="post" class="d-flex ms-auto">
            <label class="me-2">
                <input type="text" class="form-control" name="keyword" placeholder="Search">
            </label>
            <button type="submit" class="btn btn-outline-success">Search</button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered align-middle text-center">
            <thead>
            <tr>
                <th scope="col">Tài khoản</th>
                <th scope="col">Vai trò</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($currentPageItems)): foreach ($currentPageItems as $user): ?>
                <tr>
                    <th><?= $user->getUsername() ?></th>
                    <td><?= $user->getRole() ?></td>

<!--                        <form action="#" method="post">-->
<!--                            <select id="role" name="role">-->
<!---->
<!--                                --><?php //if($user->getRole() == 'admin'):?>
<!--                                    <option value="admin" selected>Admin</option>-->
<!--                                    <option value="regular">Regular</option>-->
<!--                                --><?php //else:?>
<!--                                    <option value="admin">Admin</option>-->
<!--                                    <option value="regular" selected>Regular</option>-->
<!--                                --><?php //endif;?>
<!--                            </select>-->
<!--                            <button type="submit">-->
<!--                                <i class="fas fa-save"></i>-->
<!--                            </button>-->
<!--                        </form>-->
                    </td>
                    <td class="d-flex justify-content-evenly">
<!--                        <a href="<?php ////= DOMAIN . '?controller=user&action=show&id=' . $user->getEmployeeId() ?>-->
<!--                           class="btn btn-outline-primary">-->
<!--                            <i class="fas fa-circle-info"></i>-->
<!--                        </a>-->
                        <a href="<?= DOMAIN . '?controller=user&action=edit_role&username=' .$user->getUsername()?>"
                           class="btn btn-outline-warning">
                            <i class="fas fa-pen-to-square"></i>
                        </a>
                        <a data-bs-toggle="modal" data-bs-target="#delete-user<?php echo $user->getUsername()?>"
                           class="btn btn-outline-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                        <div class="modal fade" id="delete-user<?php echo $user->getUsername()?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc muốn xóa người dùng này?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <a class="btn btn-danger" href="<?= DOMAIN . '?controller=user&action=delete&username=' . $user->getUsername() ?>">Xóa</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="save-info-department" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc muốn thay đổi thông tin ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </div>
        </div>
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