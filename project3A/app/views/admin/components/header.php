<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-success fs-4" href="<?=DOMAIN?>">DiCoSy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- <li class="nav-item"><a class="nav-link active fw-bold" aria-current="page" href="#">Trang chủ</a></li> -->
            <li class="nav-item"><a class="nav-link fw-bold" href="<?=DOMAIN.'?controller=department'?>">Quản lý phòng ban</a></li>
            <li class="nav-item"><a class="nav-link fw-bold" href="<?=DOMAIN.'?controller=employee'?>">Quản lý nhân viên</a></li>
            <li class="nav-item"><a class="nav-link fw-bold" href="<?=DOMAIN.'?controller=user'?>">Quản lý tài khoản</a></li>
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li> -->
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success me-2" type="submit">Search</button>
            <div class="dropdown">
                <button class="btn btn-outline-light" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                    <img src="./assets/images/login.jpg" style="height: 40px; width: 40px; border-radius: 50%;" alt="">
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start mt-2" style="left: -100px">
                    <li><a class="dropdown-item" href="<?=DOMAIN.'?controller=user&action=edit'?>">Chỉnh sửa thông tin</a></li>
                    <li><a class="dropdown-item" href="<?=DOMAIN.'?controller=auth&action=logout'?>">Đăng xuất</a></li>
                    <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
                </ul>
            </div>
        </form>
        </div>
    </div>
    </nav>
</header>