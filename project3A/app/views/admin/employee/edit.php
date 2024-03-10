<div class="container mt-5">
    <h1 class="my-3">Edit Employee</h1>
    <?php if (isset($employee)): ?>
        <form action="#" method="post" enctype="multipart/form-data" class="me-auto row rounded-3 shadow p-3">
            <div class="mb-3">
                <label for="fullName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName"
                       value="<?= $employee->getFullName() ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address"
                       value="<?= $employee->getAddress() ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $employee->getEmail() ?>"
                       required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?= $employee->getPhone() ?>"
                       required>
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <input type="text" class="form-control" id="position" name="position" value="<?= $employee->getPosition() ?>"
                       required>
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" class="form-control" id="avatar" name="avatar" value="<?= $employee->getAvatar() ?>"
                       required>
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <select class="form-select" id="department" name="department">
                    <?php if (isset($departments)): foreach ($departments as $d): ?>
                        <option value="<?= $d->getDepartmentId() ?>"
                            <?= $d->getDepartmentId() === $employee->getDepartmentId() ? 'selected' : '' ?>>
                            <?= $d->getDepartmentName() ?>
                        </option>
                    <?php endforeach; endif; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    <?php endif; ?>
</div>