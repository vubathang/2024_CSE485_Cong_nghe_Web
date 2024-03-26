@extends('admin.layout.app')

@section('title', 'Chỉnh sửa đơn vị')

@section('main')
    <div class="container">
        <h1 class="text-center text-uppercase">Chỉnh sửa đơn vị</h1>
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
                <form action="{{ route('admin.departments.update', $department->departmentId) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="departmentName" class="form-label">Tên đơn vị</label>
                        <input type="text" class="form-control" id="departmentName" name="departmentName"
                               value="{{ $department->departmentName }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address"
                               value="{{ $department->address }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="{{ $department->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                               value="{{ $department->phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="parentDepartmentId" class="form-label">Thuộc đơn vị</label>
                        <select class="form-select" id="parentDepartmentId" name="parentDepartmentId">
                            <option value="">-- Chọn đơn vị --</option>
                            @foreach($departments as $dep)
                                @if($dep->departmentId != $department->departmentId)
                                    <option value="{{ $dep->departmentId }}"
                                        {{ $department->parent && $dep->departmentId == $department->parent->departmentId ? 'selected' : '' }}>
                                        {{ $dep->departmentName }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success me-2">Cập nhật</button>
                        <a href="{{ route('admin.departments.index') }}" class="btn btn-primary"><i
                                class="fas fa-backward me-2"></i>Trở lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
