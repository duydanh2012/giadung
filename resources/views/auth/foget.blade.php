@extends('auth.index')

@section('title', 'Quên mật khẩu')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Khôi phục mật khẩu</h3></div>
                    @if (session('alert_error'))
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <i class="fa-solid fa-triangle-exclamation"></i>  
                            <div>
                                {{ '  ' . session('alert_error') }}
                            </div>
                        </div>
                    @elseif (session('alert_success'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="fa-solid fa-circle-check"></i>
                            <div>
                                {{ session('alert_success') }}
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="small mb-3 text-muted">Nhập địa chỉ email và chúng tôi sẽ gửi cho bạn mật khẩu mới</div>
                        <form method="POST" action="{{ route('postForget') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                <label for="inputEmail">Email</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="{{ route('login') }}">Quay lại đăng nhập</a>
                                <button type="submit" class="btn btn-primary">Khôi phục mật khẩu</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="{{ route('register') }}">Bạn chưa có tài khoản? Đăng ký!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
