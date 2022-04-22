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

                    @if (session('alert_error'))
                        <div class="alert alert-error">
                            {{session('alert_error')}}
                        </div>
                    @endif
                    <form action="{{ route('public.user.postChangePass') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Mật khẩu cũ</label>
                            <input type="password" class="form-control" id="inputPassword" placeholder="Mật khẩu cũ" maxlength="255" name="password" required>
                        </div>  

                        <div class="mb-3">
                            <label for="inputPasswordNew" class="form-label">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="inputPasswordNew" placeholder="Mật khẩu mới" maxlength="255" name="password_new" required>
                        </div>  

                        <div class="mb-3">
                            <label for="inputPasswordConfirm" class="form-label">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" id="inputPasswordConfirm" placeholder="Nhập lại mật khẩu" maxlength="255" name="password_confirm" required>
                        </div> 
                        <button type="submit" class="btn btn-warning mt-5">Thay đổi</button>
                    </form>
				</div>
			</div>
		</div>
	</section>
@stop


