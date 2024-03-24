<!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
@extends('layout.app')
@section('title', 'Thêm mới nhân viên')
@section('main')
    <div class="container">
        <div class="row">
            <h1 class="text-center text-uppercase">Thêm mới nhân viên</h1>
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
                    <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Chức vụ</label>
                            <input type="text" class="form-control" id="position" name="position" required>
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Avatar</label>
                            <input type="file" class="form-control" id="avatar" name="avatar" required>
                        </div>
                        <div class="mb-3">
                            <label for="departmentId" class="form-label">Đơn vị</label>
                            <select class="form-select" id="departmentId" name="departmentId">
                                <option value="">-- Chọn đơn vị --</option>
                                @foreach($departments as $department)
                                    <option
                                        value="{{ $department->departmentId }}">{{ $department->departmentName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success me-2">Xác nhận</button>
                            <a href="{{ route('employees.index') }}" class="btn btn-primary"><i
                                    class="fa-solid fa-backward me-2"></i>Trở lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
