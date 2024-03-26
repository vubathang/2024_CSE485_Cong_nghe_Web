<!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
@extends('admin.layout.app')
@section('title', 'Chỉnh sửa thông tin nhân viên')
@section('main')
    <div class="container">
        <div class="row">
            <h1 class="text-center text-uppercase">Chỉnh sửa thông tin nhân viên</h1>
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
                    <form action="{{ route('admin.employees.update', $employee->employeeId) }}" method="post" >
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" value="{{$employee->fullName}}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$employee->address}}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$employee->user->email}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$employee->phone}}">
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Chức vụ</label>
                            <input type="text" class="form-control" id="position" name="position" value="{{$employee->position}}">
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Avatar</label>
                            <input type="file" class="form-control" id="avatar" name="avatar" value="{{$employee->avartar}}">
                        </div>

                        <div class="mb-3">
                            <label for="departmentId" class="form-label">Đơn vị</label>
                            <select class="form-select" id="departmentId" name="departmentId">
                                <option value="">-- Chọn đơn vị --</option>
                                @foreach($departments as $d)
                                    <option value="{{ $d->departmentId }}" {{ $d->departmentId === $employee->departmentId ? 'selected' : '' }}>
                                        {{ $d->departmentName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#save-info-employee">Lưu</button>
                            <a href="{{ route('admin.employees.index') }}" class="btn btn-primary"><i class="fa-solid fa-backward me-2"></i>Trở lại</a>
                        </div>
                        <div class="modal fade" id="save-info-employee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div>
@endsection

