@extends('auth.index')

@section('title', 'Đăng ký')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tạo tài khoản</h3></div>
                    @if (count($errors) >0)
                        @foreach($errors->all() as $error)
                            @if($loop->first)
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <i class="fa-solid fa-triangle-exclamation"></i>  
                                    <div>
                                        {{ '  ' . $error }}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif 
                    <div class="card-body">
                        <form action="{{ route('postRegister') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="name" id="inputFirstName" value="{{ old('name') }}" type="text" placeholder="Nhập họ và tên của bạn" required/>
                                        <label for="inputFirstName">Họ và tên</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputEmail" type="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required />
                                        <label for="inputEmail">Địa chỉ email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputAddress" type="text" name="address" value="{{ old('address') }}" placeholder="Địa chỉ" />
                                <label for="inputAddress">Địa chỉ</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputPhone" type="text" name="phone" value="{{ old('phone') }}" placeholder="0123456789" pattern="[0-9]{10}" required/>
                                <label for="inputPhone">Số điện thoại</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" type="password"  name="password" placeholder="Mật khẩu" required />
                                        <label for="inputPassword">Mật khẩu</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPasswordConfirm" name="password_confirm" type="password" placeholder="Nhập lại mật khẩu" required />
                                        <label for="inputPasswordConfirm">Nhập lại mật khẩu</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Đăng ký</button></div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="{{ route('login') }}">Bạn đã có tài khoản? Đăng nhập</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
