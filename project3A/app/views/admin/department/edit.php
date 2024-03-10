<div class="container mt-5">
    <h1 class="my-3">Edit Department</h1>
    <?php if (isset($department)): ?>
        <form action="#" method="post" enctype="multipart/form-data" class="me-auto row rounded-3 shadow p-3">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="<?= $department->getDepartmentName() ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address"
                       value="<?= $department->getAddress() ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $department->getEmail() ?>"
                       required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?= $department->getPhone() ?>"
                       required>
            </div>
            <div class="mb-3">
                <label for="parentDepartment" class="form-label">Parent Department</label>
                <select class="form-select" id="parentDepartment" name="parentDepartment">
                    <option value="">N/A</option>
                    <?php if (isset($departments)): foreach ($departments as $d): ?>
                        <option value="<?= $d->getDepartmentId() ?>"
                            <?= $d->getDepartmentId() === $department->getParentDepartmentId() ? 'selected' : '' ?>>
                            <?= $d->getDepartmentName() ?>
                        </option>
                    <?php endforeach; endif; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    <?php endif; ?>
</div>