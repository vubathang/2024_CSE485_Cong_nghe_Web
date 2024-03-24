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
        <div class="row w-100">
            <form class="col-6 mx-auto px-4 py-2 rounded" action="{{ route('register.save')}}" method="post" style="background-color: #f5f5f5;">
                @csrf
                <h2 class="text-center fw-bold mb-4">Đăng kí</h2>
                <div class="mb-2 w-100">
                    <input required type="text" name="username" class="form-control" placeholder="Tên đăng nhập">
                    @error('username')
                        <p class="bg-danger text-light mt-2 mb-3 py-1 ps-2 rounded fw-semibold error-field"
                        >{{ $message }}</p> 
                    @enderror
                </div>
                <div class="mb-2 w-100">
                    <input required type="password" name="password" class="form-control" placeholder="Mật khẩu">
                    @error('password')
                        <p class="bg-danger text-light mt-2 mb-3 py-1 ps-2 rounded fw-semibold error-field"
                        >{{ $message }}</p> 
                    @enderror
                </div>
                <div class="mb-2 w-100">
                    <input required name="password_confirmation" type="password" class="form-control" placeholder="Nhập lại mật khẩu">
                    @error('password_confirmation')
                        <p class="bg-danger text-light mt-2 mb-3 py-1 ps-2 rounded fw-semibold error-field"
                        >{{ $message }}</p> 
                    @enderror
                </div>
                <div class="mb-2 w-100">
                    <input required type="text" name="fullName" id="fullName" class="form-control" placeholder="Họ và tên">
                    @error('fullName')
                        <p class="bg-danger text-light mt-2 mb-3 py-1 ps-2 rounded fw-semibold error-field"
                        >{{ $message }}</p> 
                    @enderror
                </div>
                <div class="mb-2 w-100">
                    <input required type="text" name="address" class="form-control" placeholder="Địa chỉ">
                    @error('address')
                        <p class="bg-danger text-light mt-2 mb-3 py-1 ps-2 rounded fw-semibold error-field"
                        >{{ $message }}</p> 
                    @enderror
                </div>
                <div class="mb-2 w-100">
                    <input required type="email" name="email" class="form-control" placeholder="Email">
                    @error('email')
                        <p class="bg-danger text-light mt-2 mb-3 py-1 ps-2 rounded fw-semibold error-field"
                        >{{ $message }}</p> 
                    @enderror
                </div>
                <div class="mb-2 w-100">
                    <input required type="text" name="phone" class="form-control" placeholder="Số điện thoại">
                    @error('phone')
                        <p class="bg-danger text-light mt-2 mb-3 py-1 ps-2 rounded fw-semibold error-field"
                        >{{ $message }}</p> 
                    @enderror
                </div>
                <div class="mb-2 w-100">
                    <input required type="text" name="position" class="form-control" placeholder="Chức vụ">
                    @error('position')
                        <p class="bg-danger text-light mt-2 mb-3 py-1 ps-2 rounded fw-semibold error-field"
                        >{{ $message }}</p> 
                    @enderror
                </div>
                <div class="mb-4 w-100">
                    <select class="form-select" name="departmentId"  aria-label="Default select example">
                        
                    </select>
                    @error('departmentId')
                        <p class="bg-danger text-light mt-2 mb-3 py-1 ps-2 rounded fw-semibold error-field"
                        >{{ $message }}</p> 
                    @enderror
                </div>
                
                <div class="mb-3 w-100">
                    <button type="submit" class="btn btn-primary w-100">Đăng kí</button>
                    <div class="text-sm text-gray-500">
                        Already have an account? <a href="{{ route('login') }}" class="">Login here</a>
                    </div>
            </form>
                </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>