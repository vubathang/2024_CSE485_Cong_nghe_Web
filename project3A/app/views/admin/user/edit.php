<?php displayView('components/header') ?>;
<div class="d-flex justify-content-center">
    <form class="row container w-50" action="#" method="post">
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
            <label for="departmentId" class="form-label">Đơn vị</label>
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

        <div class="mb-3">
                <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#save-info-department">Lưu</button>

                <!-- Modal -->
                <div class="modal fade" id="save-info-department" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc muốn thay đổi thông tin ? 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <a href="<?=DOMAIN?>?controller=home" class="text-end icon-link-hover text-decoration-none text-dark"><i class="fa-solid fa-backward me-2"></i>Trở lại</a>
    </form> 
</div>