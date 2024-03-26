<header >
    <nav class="navbar navbar-expand-lg" style="background-color: #f5f5f5;">
    <div class="container-fluid" >
        <a class="navbar-brand fw-bold text-success fs-4" href="">DiCoSy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a  class="nav-link fw-bold" href="{{ route('home') }}">Trang chủ</a></li>
            <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('departments.index') }}">Phòng ban</a></li>
            <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('employees.index') }}">Nhân viên</a></li>
        </ul>
        <div class="d-flex">
            {{-- <form class="d-flex" action="#" method="post">
                <select name="field-search" class="form-select me-3 fw-bold" style="width: 180px;">

                </select>
                <input class="form-control me-2" name="search-value" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success me-2" type="submit">Search</button>
            </form> --}}
            @if (Route::has('login'))
            @auth
                <div class="dropdown">
                <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @php
                        $avatarPath = 'avatars/' . Auth::user()->employee->avatar;
                        $publicPath = public_path($avatarPath);
                        $avatarExists = is_file($publicPath);
                    @endphp

                    <img src="{{ asset($avatarExists ? $avatarPath : 'avatars/default.png') }}"
                        style="height: 40px; width: 40px; border-radius: 50%;" alt="">
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start mt-2" style="left: -100px;">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">Chỉnh sửa thông tin</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
                </ul>
                </div>
            @else
                <a class="btn btn-success" href="{{ route('login') }}">ĐĂNG NHẬP</a>
                @if (Route::has('register'))
                <a class="btn btn-warn"  href="{{ route('register') }}">ĐĂNG KÝ</a>
                @endif
            @endauth
            @endif

        </div>
        </div>
    </div>
    </nav>
</header>
