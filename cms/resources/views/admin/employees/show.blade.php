<!-- When there is no desire, all things are at peace. - Laozi -->
@extends('admin.layout.app')
@section('title', 'Chi tiết nhân viên')
@section('main')
    <div class="container">
        <div class="row">
            <h1 class="text-center text-uppercase">Chi tiết nhân viên</h1>
            <div class="row justify-content-center my-3">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="fullName" class="form-label"><strong>Họ và tên</strong></label>
                        <input type="text" class="form-control" id="fullName" name="fullName" value="{{ $employee->fullName }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label"><strong>Địa chỉ</strong></label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $employee->address }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><strong>Email</strong></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label"><strong>Số điện thoại</strong></label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label"><strong>Chức vụ</strong></label>
                        <input type="text" class="form-control" id="position" name="position" value="{{ $employee->position }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label"><strong>Avatar</strong></label>
                        <input type="text" class="form-control" id="avatar" name="avatar" value="{{ $employee->avatar }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="departmentId" class="form-label"><strong>Đơn vị</strong></label>
                        <input type="text" class="form-control" id="departmentId" name="departmentId" value="{{ $employee->department->departmentName }}" disabled>
                    </div>
                    <div class="text-end">
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-primary"><i class="fa-solid fa-backward me-2"></i>Trở lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
