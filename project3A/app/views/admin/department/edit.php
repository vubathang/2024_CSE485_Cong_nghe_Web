<?php displayView('components/header');?>
<div class="container w-50 mt-1">
    <h1 class="my-3">Chỉnh sửa thông tin đơn vị</h1>
    <?php if (isset($department)): ?>
        <form action="#" method="post" enctype="multipart/form-data" class="me-auto row rounded-3 shadow p-3">
            <div class="mb-3">
                <label for="name" class="form-label">Tên đơn vị</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="<?= $department->getDepartmentName() ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address"
                       value="<?= $department->getAddress() ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $department->getEmail() ?>"
                       required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?= $department->getPhone() ?>"
                       required>
            </div>
            <div class="mb-3">
                <label for="parentDepartment" class="form-label">Thuộc đơn vị</label>
                <select class="form-select" id="parentDepartment" name="parentDepartment">
                    <option value="">N/A</option>
                    <?php if (isset($departments)): foreach ($departments as $d): ?>
                        <option value="<?= $d->getDepartmentId() ?>"
                            <?= $d->getDepartmentId() === $department->getParentDepartmentId() ? 'selected' : '' ?>>
                            <?= $d->getDepartmentName() ?>
                        </option>
                    <?php endforeach; endif; ?>
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
            <a href="<?=DOMAIN?>?controller=department&action=index" class="text-end icon-link-hover text-decoration-none text-dark"><i class="fa-solid fa-backward me-2"></i>Trở lại</a>

        </form>
    <?php endif; ?>
</div>