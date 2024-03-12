<div class="container-fluid d-flex justify-content-center align-items-center position-relative" style="height: 100vh; background-color: #07549a;">
    <div class="row w-100">
        <form class="col-6 mx-auto px-4 py-2 rounded" action="#" method="post" style="background-color: #f5f5f5;">
            <h2 class="text-center fw-bold mb-4">Đăng kí</h2>
            <div class="mb-2 w-100">
                <input required type="text" name="username" class="form-control" placeholder="Tên đăng nhập">
            </div>
            <?php if( isset($errors['username'])): ?>
            <p class="text-danger"><?=$errors['username']?></p>
            <?php endif;?>
            <div class="mb-2 w-100">
                <input required type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu">
            </div>
            <!-- Error -->
            <p class="d-none text-danger" id="err-password"></p>
            <div class="mb-2 w-100">
                <input required type="password" class="form-control" id="cf-password" placeholder="Nhập lại mật khẩu">
            </div>
            <!-- Error -->
            <p class="d-none text-danger" id="err-cf-password"></p>
            <div class="mb-2 w-100">
                <input required type="text" name="fullName" id="fullName" class="form-control" placeholder="Họ và tên">
            </div>
            <!-- Error -->
            <p class="d-none text-danger" id="err-fullName"></p>
            <div class="mb-2 w-100">
                <input required type="text" name="address" class="form-control" placeholder="Địa chỉ">
            </div>
            <div class="mb-2 w-100">
                <input required type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-2 w-100">
                <input required type="text" name="phone" id="phone" class="form-control" placeholder="Số điện thoại">
            </div>
            <!-- Error -->
            <p class="d-none text-danger" id="err-phone"></p>
            <div class="mb-2 w-100">
                <input required type="text" name="position" class="form-control" placeholder="Chức vụ">
            </div>
            <div class="mb-4 w-100">
                <!-- <input type="text" class="form-control" placeholder="Cơ quan"> -->
                <select class="form-select" name="departmentId"  aria-label="Default select example">
                    <?php foreach($departmentCategory as $dc): ?>
                    <option value="<?=$dc->getDepartmentId()?>"><?=$dc->getDepartmentName()?></option>
                    <?php endforeach ?>
                </select>
            </div>
            
            <div class="mb-3 w-100">
                <button type="submit" class="btn btn-primary w-100">Đăng kí</button>
            </div>
            <div class="col-12 d-flex">
                <p class="pe-1">Bạn đã có tài khoản ?</p><a href="<?=DOMAIN.'?controller=auth'?>">Đăng nhập</a>
            </div>
        </form>
    </div>
</div>