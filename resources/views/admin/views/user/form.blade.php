@extends('admin.index')

@section('title', 'Thêm người dùng')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Thêm Người Dùng</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Thêm người dùng</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-square-plus"></i>
                    Thêm người dùng mới
                </div>
                <div class="card-body">
                    <form action="{{ isset($data) ? route('user.update', $data->id) : route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @if (isset($data))
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-md-3 border-end">
                                <div class="mb-3 text-center">
                                    <label for="inputAvatar" class="form-label">Hình đại diện</label>
                                    @if (isset($data) && !empty($data->avatar))
                                        <img src="{{ asset($data->avatar) }}" class="img-thumbnail rounded" alt="Avatar">
                                    @endif
                                    <input type="file" class="form-control" id="inputAvatar" name="avatar" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="inputName" class="form-label">Họ và tên</label>
                                    <input type="text" class="form-control" id="inputName" aria-describedby="nameHelp" 
                                      placeholder="Họ và tên" maxlength="255" name="name" value="{{ isset($data) ? $data->name : old('name') }}" required>
                                    <div id="nameHelp" class="form-text">Nhập họ và tên đầy đủ của bạn.</div>
                                </div>
          
                                <div class="mb-3">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" name="email" 
                                        value="{{ isset($data) ? $data->email : old('email') }}" placeholder="Email" maxlength="255" required>
                                </div>
        
                                @if (!isset($data))
                                    <div class="mb-3">
                                        <label for="inputPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="inputPassword" placeholder="Mật khẩu" 
                                            name="password" value="{{ old('password') }}" maxlength="255" required>
                                    </div>
                                @endif
        
                                <div class="mb-3">
                                    <label for="inputPhone" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="inputPhone" placeholder="Số điện thoại" 
                                        name="phone" value="{{ isset($data) ? $data->phone : old('phone') }}" maxlength="10" pattern="[0-9]{10}">
                                </div>  

                                <div class="mb-3">
                                    <label for="inputAddress" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Địa chỉ" 
                                        name="address" value="{{ isset($data) ? $data->address : old('address') }}" maxlength="255">
                                </div>  
                            </div>
                            
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

