<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>resigter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .error-field::before {
            content: "\f071";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            color: yellow;
            padding: 0 10px 0 5px;
        }
    </style>
</head>
<body>
    <div class="container-fluid d-flex justify-content-center align-items-center position-relative" style="height: 100vh; background-color: #07549a;">
        <div class="row bg-white w-50 rounded px-3 py-4 position-relative">
            <div class="col-md-5">
                <img src="" alt="" class="object-fit-cover rounded-start" style="height: 100%; width: 300px">
                <div class="position-absolute ps-3" style="bottom: 40px;">
                    <h6 class="fw-bold fst-italic">
                        Cần thông tin hãy đến với chúng tôi
                    </h6>
                </div>
            </div>
            <form class="col-md-7 d-flex flex-column align-items-center ps-5" action="{{ route('login.action') }}" method="post">
                @csrf
                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li><span class="block sm:inline">{{ $error }}</span></li>
                        @endforeach
                    </ul>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
                @endif
                <h4>Chào mừng đến với DiCoSy</h4>
                <p class="fw-semibold">Trường Đại Học Thủy Lợi</p>
                <div class="mb-3 w-100">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" required class="form-control" name="email" id="email" placeholder="Email">
                </div>
                <div class="mb-3 w-100">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" required class="form-control" id="password" name="password" placeholder="Mật khẩu">
                </div>
                <div class="col-12 mb-3">
                    <div class="form-check">
                        <input class="form-check-input"" type="checkbox" aria-describedby="remember" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                            Nhớ tài khoản
                        </label>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                </div>
                <div class="col-12 d-flex">
                    <p class="pe-1">Hãy đến với chúng tôi ?</p><a href="{{ route('register') }}">Đăng kí</a>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>