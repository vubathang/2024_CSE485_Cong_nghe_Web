<div class="container-fluid d-flex justify-content-center align-items-center position-relative" style="height: 100vh; background-color: #07549a;">
    <?php if($error):?>
    <div class="alert alert-danger position-absolute z-1 fw-bold" role="alert" style="top: 30px;">
        <i class="fa-solid fa-triangle-exclamation text-danger pe-2"></i><?=$error?>
    </div>
    <?php endif;?>
    <div class="row bg-white w-50 rounded px-3 py-4 position-relative">
        <div class="col-md-5">
            <img src="./assets/images/login.jpg" alt="" class="object-fit-cover rounded-start" style="height: 100%; width: 300px">
            <div class="position-absolute ps-3" style="bottom: 40px;">
                <h6 class="fw-bold fst-italic">
                    Cần thông tin hãy đến với chúng tôi
                </h6>
            </div>
        </div>
        <form class="col-md-7 d-flex flex-column align-items-center ps-5" action="#" method="post">
            <h4>Chào mừng đến với DiCoSy</h4>
            <p class="fw-semibold">Trường Đại Học Thủy Lợi</p>
            <div class="mb-3 w-100">
                <label for="username" class="form-label">Tên đăng nhập</label>
                <input type="text" required class="form-control" name="username" id="username" placeholder="Tên đăng nhập"
                    value="<?= $_SESSION['username_login'] ?? ''?>"
                >
            </div>
            <div class="mb-3 w-100">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" required class="form-control" id="password" name="password" placeholder="Mật khẩu"
                    value="<?= $_SESSION['password_login'] ?? ''?>"
                >
            </div>
            <div class="col-12 mb-3">
                <div class="form-check">
                    <input class="form-check-input" <?= isset($_SESSION['rememberAcc']) ? 'checked' : ''?> type="checkbox" name="rememberAcc" id="rememberAcc">
                    <label class="form-check-label" for="rememberAcc">
                        Nhớ tài khoản
                    </label>
                </div>
            </div>
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
            </div>
            <div class="col-12 d-flex">
                <p class="pe-1">Hãy đến với chúng tôi ?</p><a href="<?=DOMAIN.'?controller=auth&action=register'?>">Đăng kí</a>
            </div>
        </form>
    </div>
</div>