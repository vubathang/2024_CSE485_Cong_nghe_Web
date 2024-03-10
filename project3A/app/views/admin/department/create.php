<div class="container mt-5">
    <h1 class="my-3">Create Department</h1>
    <form action="#" method="post" enctype="multipart/form-data" class="me-auto row rounded-3 shadow p-3">
        <div class="mb-3">
            <label for="departmentName" class="form-label">Name</label>
            <input type="text" class="form-control" id="departmentName" name="departmentName" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="parentDepartment" class="form-label">Parent Department</label>
            <select class="form-select" id="parentDepartment" name="parentDepartment">
                <option value="">N/A</option>
                <?php if (isset($departments)): foreach ($departments as $department): ?>
                    <option value="<?= $department->getDepartmentId() ?>"><?= $department->getDepartmentName() ?></option>
                <?php endforeach; endif; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>