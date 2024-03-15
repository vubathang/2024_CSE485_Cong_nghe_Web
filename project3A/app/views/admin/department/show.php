<?php displayView('components/header');?>

<div class="container">
    <div class="mt-5 me-auto row rounded-3 shadow p-3">
        <h1 class="mb-3">Thông tin phòng ban</h1>
        <p><strong>Tên:</strong> <?= $department->getDepartmentName() ?></p>
        <p><strong>Địa chỉ:</strong> <?= $department->getAddress() ?></p>
        <p><strong>Email:</strong> <?= $department->getEmail() ?></p>
        <p><strong>Số điện thoại:</strong> <?= $department->getPhone() ?></p>
        <p><strong>Thuộc đơn vị:</strong> <?= $department->getParentDepartmentName() ?></p>
        <a href="<?=DOMAIN?>?controller=department&action=index" class="text-end icon-link-hover text-decoration-none text-dark"><i class="fa-solid fa-backward me-2"></i>Trở lại</a>
    
    </div>
</div>