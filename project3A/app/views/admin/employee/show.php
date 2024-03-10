<div class="container">
    <div class="mt-5 me-auto row rounded-3 shadow p-3">
        <h1 class="mb-3">Employee Details</h1>
        <p><strong>Full Name:</strong> <?= $employee->getFullName() ?></p>
        <p><strong>Address:</strong> <?= $employee->getAddress() ?></p>
        <p><strong>Email:</strong> <?= $employee->getEmail() ?></p>
        <p><strong>Phone:</strong> <?= $employee->getPhone() ?></p>
        <p><strong>Position:</strong> <?= $employee->getPosition() ?></p>
        <p><strong>Avatar:</strong> <?= $employee->getAvatar() ?></p>
        <p><strong>Department:</strong> <?= $employee->getDepartmentName() ?></p>
    </div>
</div>