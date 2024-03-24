@extends('admin.layout.app')

@section('title', 'Thông tin người dùng')

@section('main')
    <div class="container">
        <h1 class="text-center text-uppercase">Thông tin người dùng</h1>
        <div class="row justify-content-center my-3">
            <div class="col-6">
                <div class="mb-3">
                    <label for="email" class="form-label"><strong>Email</strong></label>
                    <input type="text" class="form-control" id="email" name="email"
                           value="{{ $user->email }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="fullName" class="form-label"><strong>Họ tên</strong></label>
                    <input type="text" class="form-control" id="fullName" name="fullName"
                           value="{{ $user->employee->fullName }}" disabled>
                </div>   
                <div class="mb-3">
                    <label for="role" class="form-label"><strong>Vai trò</strong></label>
                    <input type="text" class="form-control" id="role" name="role"
                           value="{{ $user->role === 'admin' ? "Quản trị viên" : "Người dùng thường" }}" disabled>
                </div>   
                <div class="mb-3 text-end">
                    <a href="{{ route('users.index') }}" class="btn btn-primary"><i
                            class="fas fa-backward me-2"></i>Trở lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection