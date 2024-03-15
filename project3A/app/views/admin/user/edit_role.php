<?php displayView('components/header');?>
<div class="container w-50 mt-1">
    <h3 class="my-3">Chỉnh sửa thông tin người dùng</h3>
    <?php if (isset($user)): ?>
    <form action="#" method="post" class="me-auto row rounded-3 shadow p-3">
        <div class="mb-3">
            <label for="username" class="form-label">Tài khoản</label>
            <input type="text" class="form-control" id="username" name="username"
                   value="<?= $user->getUserName() ?>" required readonly>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Vai trò</label>
            <select class="form-select" id="role" name="role">
                <?php if($user->getRole() == 'admin'):?>
                    <option value="admin" selected>Admin</option>
                    <option value="regular">Regular</option>
                <?php else:?>
                    <option value="admin">Admin</option>
                    <option value="regular" selected>Regular</option>
                <?php endif;?>
            </select>
        </div>
        <div class="mb-3">
            <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#save-info-department">Lưu</button>

            <!-- Modal -->
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
        </div>
        <a href="<?=DOMAIN?>?controller=user&action=index" class="text-end icon-link-hover text-decoration-none text-dark"><i class="fa-solid fa-backward me-2"></i>Trở lại</a>
    </form>
    <?php endif; ?>
</div>
