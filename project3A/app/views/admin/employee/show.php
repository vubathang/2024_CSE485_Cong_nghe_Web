<?php displayView('components/header');?>
<div class="container">
    <div class="mt-5 me-auto row rounded-3 shadow p-3">
        <h1 class="mb-3">Thông tin nhân viên</h1>
        <p><strong>Họ tên:</strong> <?= $employee->getFullName() ?></p>
        <p><strong>Địa chỉ:</strong> <?= $employee->getAddress() ?></p>
        <p><strong>Email:</strong> <?= $employee->getEmail() ?></p>
        <p><strong>Số điện thoại:</strong> <?= $employee->getPhone() ?></p>
        <p><strong>Vị trí:</strong> <?= $employee->getPosition() ?></p>
        <!-- <p><strong>Ảnh đại diện:</strong> <?= $employee->getAvatar() ?></p> -->
        <p><strong>Đơn vị:</strong> <?= $employee->getDepartmentName() ?></p>
        <a href="<?=DOMAIN?>?controller=employee&action=index" class="text-end icon-link-hover text-decoration-none text-dark"><i class="fa-solid fa-backward me-2"></i>Trở lại</a>
    </div>
</div>