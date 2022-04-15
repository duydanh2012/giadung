@extends('admin.index')

@section('title', 'Thay đổi mật khẩu')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Thay đổi mật khẩu</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Thay đổi mật khẩu</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-pen-to-square"></i> 
                    Thay đổi mật khẩu
                </div>
                <div class="card-body">
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
                    <form action="{{ route('user.postchangepass') }}" method="POST">
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

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

