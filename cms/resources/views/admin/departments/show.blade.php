@extends('admin.layout.app')

@section('title', 'Thông tin đơn vị')

@section('main')
    <div class="container">
        <h1 class="text-center text-uppercase">Thông tin đơn vị</h1>
        <div class="row justify-content-center my-3">
            <div class="col-6">
                <div class="mb-3">
                    <label for="departmentName" class="form-label"><strong>Tên đơn vị</strong></label>
                    <input type="text" class="form-control" id="departmentName" name="departmentName"
                           value="{{ $department->departmentName }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label"><strong>Địa chỉ</strong></label>
                    <input type="text" class="form-control" id="address" name="address"
                           value="{{ $department->address }}"
                           disabled>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label"><strong>Email</strong></label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $department->email }}"
                           disabled>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label"><strong>Số điện thoại</strong></label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $department->phone }}"
                           disabled>
                </div>
                <div class="mb-3">
                    <label for="parentDepartmentId" class="form-label"><strong>Thuộc đơn vị</strong></label>
                    <input type="text" class="form-control" id="parentDepartmentId" name="parentDepartmentId"
                           value="{{ $department->parent ? $department->parent->departmentName : 'N/A' }}" disabled>
                </div>
                <div class="mb-3 text-end">
                    <a href="{{ route('departments.index') }}" class="btn btn-primary"><i
                            class="fas fa-backward me-2"></i>Trở lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
