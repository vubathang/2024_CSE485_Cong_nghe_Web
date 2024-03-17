<?php displayView('components/header');?>
<div class="container mt-5">
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?= "Không thể thêm đơn vị" ?>
        </div>
    <?php elseif (isset($_GET['success'])): ?>
        <div class="alert alert-success" role="alert">
            <?= "Thêm đơn vị thành công" ?>
        </div>
    <?php endif; ?>
    <h1 class="my-3">Thêm mới đơn vị</h1>
    <form action="#" method="post" enctype="multipart/form-data" class="me-auto row rounded-3 shadow p-3">
        <div class="mb-3">
            <label for="departmentName" class="form-label">Tên đơn vị</label>
            <input type="text" class="form-control" id="departmentName" name="departmentName" required>
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
            <label for="parentDepartment" class="form-label">Thuộc đơn vị</label>
            <select class="form-select" id="parentDepartment" name="parentDepartment">
                <option value="">N/A</option>
                <?php if (isset($departments)): foreach ($departments as $department): ?>
                    <option value="<?= $department->getDepartmentId() ?>"><?= $department->getDepartmentName() ?></option>
                <?php endforeach; endif; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Thêm mới</button>


        <a href="<?=DOMAIN?>?controller=department&action=index" class="text-end icon-link-hover text-decoration-none text-dark"><i class="fa-solid fa-backward me-2"></i>Trở lại</a>

    </form>
</div>