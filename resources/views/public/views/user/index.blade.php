@extends('public.index')

@section('title', 'Trang cá nhân')

@section('content')
    <section>
		<div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="/">Home</a></li>
                  <li class="active">Chỉnh sửa thông tin cá nhân</li>
                </ol>
            </div>
			<div class="row">
                @include('public.views.user.category')
				
				<div class="col-sm-9 padding-right">
                    @if (session('alert_success'))
                        <div class="alert alert-success">
                            {{session('alert_success')}}
                        </div>
                    @endif
                    <form action="{{ route('public.user.update') }}" method="POST">
                        @csrf
                        @method('PUT')
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

                                <button type="submit" class="btn btn-warning mt-5">Thay đổi</button>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</section>
@stop


