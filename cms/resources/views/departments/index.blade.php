@extends('layout.app')

@section('title', 'Đơn vị')

@section('main')
    <div class="container">
        <h1 class="text-center text-uppercase my-3">Đơn vị</h1>
        <div class="d-flex justify-content-end my-3">
            <div class="col-3">
                <form action="{{ route('departments.index') }}" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm...">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach($departments as $dep)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header text-dark">
                            <h5 class="card-title">{{ $dep->departmentName }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Số điện thoại: {{ $dep->phone }}</p>
                            <p class="card-text">Email: {{ $dep->email }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('departments.show', $dep->departmentId) }}" class="btn btn-info">Xem
                                chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $departments->links('layout.pagination') }}
        </div>
    </div>
@endsection
