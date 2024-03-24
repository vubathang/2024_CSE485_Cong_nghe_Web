@extends('layout.app')
@section('title', 'Trang chủ')

@section('main')
<div class="d-flex flex-column align-items-center justify-content-center">
    @if (session('success'))
        <div class="mt-3 alert alert-success" style="width: 70%">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="mt-3 alert alert-danger" style="width: 70%">
            {{ session('error') }}
        </div>
    @endif
    <form class="row container" action="{{ route('profile.save') }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- @method('put') --}}
        <h4 class="col-12 p-3">Thông tin cá nhân</h4>
        <div class="mb-3 col-6">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}" readonly>
        </div>
        <div class="mb-3 col-6">
            <label for="employeeId" class="form-label">Mã nhân viên</label>
            <input type="text" class="form-control" name="employeeId" id="employeeId" value="{{ $user->employeeId }}" readonly>
        </div>
        <div class="mb-3 col-6">
            <label for="password" class="form-label">Mật khẩu cũ</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3 col-6">
            <label for="newPassword" class="form-label">Mật khẩu mới</label>
            <input type="password" class="form-control" name="newPassword" id="newPassword">
        </div>
        <div class="mb-3 col-6">
            <label for="fullName" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" name="fullName" id="fullName" value="{{ $user->employee->fullName }}">
        </div>
        <div class="mb-3 col-6">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $user->employee->address }}">
        </div>
        <div class="mb-3 col-6">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" id="phone" value="{{ $user->employee->phone }}">
        </div>
        <div class="mb-3 col-6">
            <label for="position" class="form-label">Chức vụ</label>
            <input type="text" class="form-control" name="position" id="position" value="{{ $user->employee->position }}">
        </div>
        <div class="mb-3 col-6">
            <label for="departmentId" class="form-label">Phòng ban</label>
            <select class="form-select" id="departmentId" name="departmentId">
                @foreach($departments as $department)
                    @if ($user->employee->departmentId == $department->departmentId)
                    <option selected
                        value="{{ $department->departmentId }}">{{ $department->departmentName }}
                    </option>
                    @else
                    <option
                        value="{{ $department->departmentId }}">{{ $department->departmentName }}
                    </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-12 mb-5">
            <label for="avatar" class="form-label">Ảnh đại diện</label>
            <div class="input-group">
                <input type="file" class="form-control" id="avatar" name="avatar">
            </div>
        </div>
        <div class="col-12 mb-3">
            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#save-info-user">Lưu</button>

            <!-- Modal -->
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
        </div>
    </form> 
</div>
@endsection