@extends('admin.layout.app')

@section('title', 'Chỉnh sửa người dùng')

@section('main')
    <div class="container">
        <h1 class="text-center text-uppercase">Chỉnh sửa người dùng</h1>
        <div class="row justify-content-center my-3">
            <div class="col-6">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                               value="{{ $user->email }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ Tên</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ $user->employee->fullName }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Vai trò</label>
                        <select class="form-select" id="role" name="role">
                            <option value="">-- Chọn vai trò --</option>
                            <option value="admin">Quản trị viên</option>
                            <option value="regular">Người dùng thường</option>
                        </select>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success me-2">Cập nhật</button>
                        <a href="{{ route('users.index') }}" class="btn btn-primary"><i
                                class="fas fa-backward me-2"></i>Trở lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
