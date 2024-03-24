@extends('admin.layout.app')

@section('title', 'Thêm mới đơn vị')

@section('main')
    <div class="container">
        <h1 class="text-center text-uppercase">Thêm mới đơn vị</h1>
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
                <form action="{{ route('departments.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="departmentName" class="form-label">Tên đơn vị</label>
                        <input type="text" class="form-control" id="departmentName" name="departmentName">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="parentDepartmentId" class="form-label">Thuộc đơn vị</label>
                        <select class="form-select" id="parentDepartmentId" name="parentDepartmentId">
                            <option value="">-- Chọn đơn vị --</option>
                            @foreach($departments as $department)
                                <option
                                    value="{{ $department->departmentId }}">{{ $department->departmentName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success me-2">Xác nhận</button>
                        <a href="{{ route('departments.index') }}" class="btn btn-primary"><i
                                class="fa-solid fa-backward me-2"></i>Trở
                            lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
