<div class="container">
    <div class="mt-5 me-auto row rounded-3 shadow p-3">
        <h1 class="mb-3">Department Details</h1>
        <p><strong>Name:</strong> <?= $department->getDepartmentName() ?></p>
        <p><strong>Address:</strong> <?= $department->getAddress() ?></p>
        <p><strong>Email:</strong> <?= $department->getEmail() ?></p>
        <p><strong>Phone:</strong> <?= $department->getPhone() ?></p>
        <p><strong>Parent Department:</strong> <?= $department->getParentDepartmentName() ?></p>
    </div>
</div>