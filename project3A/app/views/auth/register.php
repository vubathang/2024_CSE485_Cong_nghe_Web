<div class="container-fluid d-flex justify-content-center align-items-center position-relative" style="height: 100vh; background-color: #07549a;">
    <div class="row w-100">
        <form class="col-6 mx-auto px-4 py-2 rounded" action="#" method="post" style="background-color: #f5f5f5;">
            <h2 class="text-center fw-bold mb-4">Đăng kí</h2>
            <div class="mb-3 w-100">
                <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập">
            </div>
            <div class="mb-3 w-100">
                <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
            </div>
            <div class="mb-3 w-100">
                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu">
            </div>
            <div class="mb-3 w-100">
                <input type="text" name="fullName" class="form-control" placeholder="Họ và tên">
            </div>
            <div class="mb-3 w-100">
                <input type="text" name="address" class="form-control" placeholder="Địa chỉ">
            </div>
            <div class="mb-3 w-100">
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3 w-100">
                <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
            </div>
            <div class="mb-3 w-100">
                <input type="text" name="position" class="form-control" placeholder="Chức vụ">
            </div>
            <div class="mb-5 w-100">
                <input type="text" name="departmentId" class="form-control" placeholder="Cơ quan">
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