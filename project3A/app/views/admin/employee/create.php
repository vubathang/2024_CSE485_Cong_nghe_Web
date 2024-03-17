<?php displayView('components/header');?>

<div class="container mt-5">
    <?php if (isset($_GET['error'])): ?>

        <div class="alert alert-danger" role="alert">
            <?= "Không thể thêm nhân viên" ?>
        </div>
    <?php elseif (isset($_GET['success'])): ?>
        <div class="alert alert-success" role="alert">
            <?= "Thêm nhân viên thành công" ?>
        </div>
    <?php endif; ?>
    <h1 class="my-3">Thêm nhân viên</h1>
    <form action="#" method="post" class="me-auto row rounded-3 shadow p-3">
        <div class="mb-3">
            <label for="fullName" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="fullName" name="fullName" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Chức vụ</label>
            <input type="text" class="form-control" id="position" name="position" required>
        </div>
        <!-- <div class="mb-3">
            <label for="avatar" class="form-label">Avatar</label>
            <input type="file" class="form-control" id="avatar" name="avatar" required>
        </div> -->
        <div class="mb-3">
            <label for="departmentId" class="form-label">Đơn vị</label>
            <select class="form-select" id="departmentId" name="departmentId">
                <?php if (isset($departments)): foreach ($departments as $department): ?>
                    <option value="<?= $department->getDepartmentId() ?>"><?= $department->getDepartmentName() ?></option>
                <?php endforeach; endif; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
        <a href="<?=DOMAIN?>?controller=employee&action=index" class="text-end icon-link-hover text-decoration-none text-dark"><i class="fa-solid fa-backward me-2"></i>Trở lại</a>

    </form>
</div>