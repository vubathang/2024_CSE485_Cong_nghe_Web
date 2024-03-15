<?php displayView('components/header')?>

<div class="container mt-5" style="width: 500px;">
    <div class="my-5 me-auto row rounded-3 shadow p-3">
        <h1><?= $department->getDepartmentName() ?></h1>
        <p><strong>Address:</strong> <?= $department->getAddress() ?></p>
        <p><strong>Email:</strong> <?= $department->getEmail() ?></p>
        <p><strong>Phone:</strong> <?= $department->getPhone() ?></p>
        <p><strong>Parent Department:</strong> <?= $department->getParentDepartmentName() ?></p>
    </div>
</div>