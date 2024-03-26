@extends('admin.layout.app')

@section('title', 'Quản lý đơn vị')

@section('main')
    <div class="container">
        <h1 class="text-center text-uppercase mt-3">Quản lý đơn vị</h1>
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
            <a href="{{ route('departments.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i>
                Thêm mới</a>
            <form action="{{ route('departments.index') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Tìm kiếm...">
                    <button class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered align-middle">
                <thead>
                <tr>
                    <th scope="col" class="text-center">STT</th>
                    <th scope="col" class="text-center">Tên đơn vị</th>
                    <th scope="col" class="text-center">Thuộc đơn vị</th>
                    <th scope="col" class="text-center">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                    <tr>
                        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                        <td>{{ $department->departmentName }}</td>
                        <td>{{ $department->parent ? $department->parent->departmentName : 'N/A' }}</td>
                        <td class="d-flex justify-content-evenly">
                            <a href="{{ route('admin.departments.show', $department->departmentId) }}"
                               class="btn btn-primary"><i class="fas fa-circle-info"></i></a>
                            <a href="{{ route('admin.departments.edit', $department->departmentId) }}"
                               class="btn btn-warning"><i class="fas fa-pen-to-square"></i></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#{{ $department->departmentId }}">
                                <i class="fas fa-trash"></i>
                            </button>

                            <div class="modal fade" id="{{ $department->departmentId }}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa đơn vị</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Đóng"></button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn có chắc chắn muốn xóa đơn vị này không?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Hủy
                                            </button>
                                            <form
                                                action="{{ route('admin.departments.destroy', $department->departmentId) }}"
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
            {{ $departments->links('layout.pagination') }}
        </div>
    </div>
@endsection
