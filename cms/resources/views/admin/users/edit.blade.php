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
                <form action="{{ route('admin.users.update', $user->id) }}" method="post">
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
                        <button type="button" class="btn btn-success me-2"  data-bs-toggle="modal" data-bs-target="#save-info-user">Lưu</button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary"><i
                                class="fas fa-backward me-2"></i>Trở lại</a>
                    </div>
                    <div class="modal fade" id="save-info-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc muốn thay đổi thông tin ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-success">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
