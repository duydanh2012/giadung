@extends('admin.index')

@section('title', isset($data) ? 'Sửa loại sản phẩm' : 'Thêm loại sản phẩm')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">@if(isset($data)) Sửa loại sản phẩm @else Thêm loại sản phẩm @endif</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('type.index') }}">Loại sản phẩm</a></li>
                <li class="breadcrumb-item active">@if(isset($data)) Sửa loại sản phẩm @else Thêm loại sản phẩm @endif</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    @if(isset($data))
                        <i class="fa-solid fa-pen-to-square"></i> 
                        Sửa loại sản phẩm
                    @else 
                        <i class="fa-solid fa-square-plus"></i>
                        Thêm loại sản phẩm mới
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ isset($data) ? route('type.update', $data->id) : route('type.store') }}" method="POST" enctype="multipart/form-data">
                        @if (isset($data))
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Tên loại sản phẩm</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Tên loại sản phẩm" maxlength="255" name="name" value="{{ isset($data) ? $data->name : old('name') }}" required>
                        </div>  

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

