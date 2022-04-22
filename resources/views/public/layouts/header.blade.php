@php
    $types = getTypes(5);
@endphp
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="javascipt:void(0);"><i class="fa fa-phone"></i> +84 123 456 789</a></li>
                            <li><a href="javascipt:void(0);"><i class="fa fa-envelope"></i>vanhung@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="navbar navbar-expand-lg social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="javascipt:void(0);"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="javascipt:void(0);"><i class="fa-brands fa-twitter"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="javascipt:void(0);"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="javascipt:void(0);"><i class="fa-brands fa-google-plus-g"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ route('public.index') }}"><img src="{{ asset('assets/fontend/images/logo.png') }}" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8 ">
                    <div class="navbar navbar-expand-lg shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"><a href="{{ route('cart.list') }}" class="nav-link"><i class="fa fa-shopping-cart"></i> Cart {{ Cart::getTotalQuantity()}}</a></li>
                            @if (Auth::check())
                                <li class="nav-item"><a href="{{ route('public.user.index') }}" class="nav-link"><i class="fa fa-user"></i> Tài khoản</a></li>
                                <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất</a></li>
                            @else
                                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link"><i class="fa fa-lock"></i> Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ route('public.index') }}" class="active">Trang Chủ</a></li>
                            <li><a href="{{ route('public.list') }}">Sản phẩm</a></li>
                            <li class="dropdown"><a href="#">Danh mục<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach ($types as $item)
                                        <li><a href="{{ route('public.type', $item->slug) }}">{{ $item->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li> 
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form action="{{ route('public.search') }}" method="get" id="search-form">
                            <input type="text" name="q" placeholder="Search"/>
                            <button type="submit" style="display: none;">Tìm kiếm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
