<!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
@extends('admin.layout.app')

@section('title', 'Quản lý nhân viên')

@section('main')
    <div class="container">
        <div class="row">
            <h1 class="text-center text-uppercase mt-3">Quản lý nhân viên</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="d-flex justify-content-between my-3">
                <a href="{{ route('admin.employees.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i>
                    Thêm mới</a>
                <form action="{{ route('employees.index') }}" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm">
                        <button class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover  table-bordered align-middle">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">STT</th>
                            <th scope="col" class="text-center">Họ và tên</th>
                            <th scope="col" class="text-center">Địa chỉ</th>
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col" class="text-center">Số điện thoại</th>
                            <th scope="col" class="text-center">Chức vụ</th>
                            <th scope="col" class="text-center">Đơn vị</th>
                            <th scope="col" class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                <td>{{ $employee->fullName }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>{{ $employee->user->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->department ? $employee->department->departmentName : 'N/A' }}</td>
                                <td class="d-flex justify-content-evenly">
                                    <a href="{{ route('admin.employees.show', $employee->employeeId) }}"
                                       class="btn btn-primary"><i class="fas fa-circle-info"></i></a>
                                    <a href="{{ route('admin.employees.edit', $employee->employeeId) }}"
                                       class="btn btn-warning"><i class="fas fa-pen-to-square"></i></a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#{{ $employee->employeeId }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <div class="modal fade" id="{{ $employee->employeeId }}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa nhân viên</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Đóng"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc chắn muốn xóa nhân viên này không?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                        Hủy
                                                    </button>
                                                    <form
                                                        action="{{ route('admin.employees.destroy', $employee->employeeId) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $employees->links('layout.pagination') }}
            </div>
        </div>
@endsection

