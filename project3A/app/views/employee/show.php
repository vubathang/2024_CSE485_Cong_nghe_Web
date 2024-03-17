<?php displayView('components/header')?>

<div class="container mt-5" style="width: 500px;">
    <div class="my-5 me-auto row rounded-3 shadow p-3 bg-white">
        <?php
            if (file_exists(ROOT_PATH.'/public/assets/uploads/avatar-'.$employee->getEmployeeId().'.jpg')) {
                $avatar = './assets/uploads/avatar-'.$employee->getEmployeeId().'.jpg';
            } 
            else if(file_exists(ROOT_PATH.'/public/assets/uploads/avatar-'.$employee->getEmployeeId().'.png')) {
                $avatar = './assets/uploads/avatar-'.$employee->getEmployeeId().'.png';
            }                        
            else {
                $avatar = './assets/uploads/default.png';
            }
        ?>
        <div class="position-relative" style="height: 200px;">
            <img src="./assets/images/banner.jpg" class="w-100 object-fit-cover position-relative" style="height: 150px;">
            <img src="<?=$avatar?>" alt="<?= $employee->getFullName() ?>" style="width: 100px; height: 100px; border-radius: 50%" class="round-circle position-absolute bottom-0 start-50 translate-middle-x">
        </div>
        <h3 class="text-center pt-2"><?= $employee->getFullName() ?></h3>
        <p><strong>Email:</strong> <?= $employee->getEmail() ?></p>
        <p><strong>Số điện thoại:</strong> <?= $employee->getPhone() ?></p>
        <p><strong>Vị trí:</strong> <?= $employee->getPosition() ?></p>
        <p><strong>Cơ quan:</strong> <?= $employee->getDepartmentName() ?></p>
        <p><strong>Địa chỉ:</strong> <?= $employee->getAddress() ?></p>
        <a href="<?=DOMAIN?>?controller=employee&action=index" class="text-end icon-link-hover text-decoration-none text-dark"><i class="fa-solid fa-backward me-2"></i>Quay lại</a>
    </div>
</div>