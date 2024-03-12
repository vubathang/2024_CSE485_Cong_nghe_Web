<?php displayView('components/header')?>

<div class="container mt-5" style="width: 500px;">
    <div class="my-5 me-auto row rounded-3 shadow p-3">
        <h1><?= $employee->getFullName() ?></h1>
        <img src="<?= $employee->getAvatar() ?>" alt="<?= $employee->getFullName() ?>" class="img-thumbnail">
        <p><strong>Address:</strong> <?= $employee->getAddress() ?></p>
        <p><strong>Email:</strong> <?= $employee->getEmail() ?></p>
        <p><strong>Phone:</strong> <?= $employee->getPhone() ?></p>
        <p><strong>Position:</strong> <?= $employee->getPosition() ?></p>
        <p><strong>Department:</strong> <?= $employee->getDepartmentName() ?></p>
    </div>
</div>