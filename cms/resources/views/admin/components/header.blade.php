<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-success fs-4" href="{{ route('admin/home') }}">DiCoSy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- <li class="nav-item"><a class="nav-link active fw-bold" aria-current="page" href="#">Trang chủ</a></li> -->
            <li class="nav-item"><a class="nav-link fw-bold" href="">Quản lý phòng ban</a></li>
            <li class="nav-item"><a class="nav-link fw-bold" href="">Quản lý nhân viên</a></li>
            <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('users.index') }}">Quản lý tài khoản</a></li>
            
        </ul>
        <div class="dropdown">
                <button class="btn btn-outline-light" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                    @php
                            $avatarPath = 'avatars/' . Auth::user()->employee->avatar;
                            $publicPath = public_path($avatarPath);
                            $avatarExists = is_file($publicPath);
                    @endphp

                    <img src="{{ asset($avatarExists ? $avatarPath : 'avatars/default.png') }}"
                        style="height: 40px; width: 40px; border-radius: 50%;" alt="">
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start mt-2" style="left: -100px">
                    <li><a class="dropdown-item" href="{{ route('admin/profile') }}">Chỉnh sửa thông tin</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout')}}">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </div>
    </nav>
</header>