<?php displayView('components/header') ?>;
<div class="d-flex justify-content-center">
    <form action="#" method="post">
        <h4 class="p-3">Thông tin cá nhân</h4>
        <div class="mb-3 w-100">
            <label for="username" class="form-label">Tên đăng nhập</label>
            <input type="text" disabled class="form-control" name="username" id="username" value="<?=$user->getUsername()?>">
        </div>
        <div class="mb-3 w-100">
            <label for="oldPassword" class="form-label">Mật khẩu cũ</label>
            <input type="password" class="form-control" name="oldPassword" id="oldPassword">
        </div>
        <div class="mb-3 w-100">
            <label for="newPassword" class="form-label">Mật khẩu mới</label>
            <input type="password" class="form-control" name="newPassword" id="newPassword">
        </div>
        <!-- <div class="mb-3 w-100">
            <label for="fullName" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" name="fullName" id="fullName" value="<?=$employee->getFullName()?>">
        </div>
        <div class="mb-3 w-100">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address" id="address" value="<?=$user->getAddress()?>">
        </div>
        <div class="mb-3 w-100">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?=$user->getEmail()?>">
        </div>
        <div class="mb-3 w-100">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?=$user->getPhone()?>">
        </div>
        <div class="mb-3 w-100">
            <label for="position" class="form-label">Chức vụ</label>
            <input type="text" class="form-control" name="position" id="position" value="<?=$user->getPosition()?>">
        </div>
        <div class="mb-3 w-100">
            <label for="departmentId" class="form-label">Phòng ban</label>
            <input type="text" class="form-control" name="departmentId" id="departmentId" value="<?=$user->getDepartmentId()?>">
        </div> -->

        <div class="col-12 mb-3">
            <button type="submit" class="btn btn-primary w-100">Cập nhật</button>
        </div>
    </form> 
</div>