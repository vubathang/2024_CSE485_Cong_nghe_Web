<?php displayView('components/header') ?>;
<div class="d-flex justify-content-center">
    <form class="row container" action="#" method="post">
        <h4 class="col-12 p-3">Thông tin cá nhân</h4>
        <div class="mb-3 col-6">
            <label for="username-edit" class="form-label" >Tên đăng nhập</label>
            <input type="text" readonly class="form-control" name="username" id="username-edit" value="<?=$user->getUsername()?>">
        </div>
        <div class="mb-3 col-6">
            <label for="employeeId-edit" class="form-label" >Mã nhân viên</label>
            <input type="text" readonly class="form-control" name="employeeId" id="employeeId-edit" value="<?=$employee->getEmployeeId()?>">
        </div>
        <div class="mb-3 col-6">
            <label for="oldPassword-edit" class="form-label">Mật khẩu cũ</label>
            <input type="password" class="form-control" name="oldPassword" id="oldPassword-edit">
        </div>
        <div class="mb-3 col-6">
            <label for="newPassword-edit" class="form-label">Mật khẩu mới</label>
            <input type="password" class="form-control" name="newPassword" id="newPassword-edit">
        </div>
        <div class="mb-3 col-6">
            <label for="fullName" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" name="fullName" id="fullName" value="<?=$employee->getFullName()?>">
        </div>
        <div class="mb-3 col-6">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address" id="address" value="<?=$employee->getAddress()?>">
        </div>
        <div class="mb-3 col-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?=$employee->getEmail()?>">
        </div>
        <div class="mb-3 col-6">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?=$employee->getPhone()?>">
        </div>
        <!-- Error -->
        <p class="d-none text-danger" id="err-phone"></p>
        <div class="mb-3 col-6">
            <label for="position" class="form-label">Chức vụ</label>
            <input type="text" class="form-control" name="position" id="position" value="<?=$employee->getPosition()?>">
        </div>
        <!-- <div class="mb-3 col-6">
            <input type="text" class="form-control" name="departmentId" id="departmentId" value="<?=$employee->getDepartmentId()?>">
        </div> -->
        <div class="mb-3 col-6">
            <label for="departmentId" class="form-label">Phòng ban</label>
            <!-- <input type="text" class="form-control" placeholder="Cơ quan"> -->
            <select class="form-select" name="departmentId"  aria-label="Default select example">
                <?php foreach($deparments as $dc): ?>
                    <?php if($employee->getDepartmentId() == $dc->getDepartmentId()):?>
                    <option selected value="<?=$dc->getDepartmentId()?>"><?=$dc->getDepartmentName()?></option>
                    <?php else:?>
                    <option value="<?=$dc->getDepartmentId()?>"><?=$dc->getDepartmentName()?></option>
                    <?php endif;?>
                <?php endforeach ?>
            </select>
        </div>

        <div class="col-12 mb-3">
            <button type="submit" class="btn btn-primary w-100">Sửa</button>
        </div>
    </form> 
</div>