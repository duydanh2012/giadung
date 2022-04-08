@extends('core/base::layouts.base')

@section('body-class') login @stop
@section('body-style') background-image: url({{ get_login_background() }}); @stop

@section ('page')
    <div class="container-fluid">
        <div class="row">
            <div class="faded-bg animated"></div>
            <div class="hidden-xs col-sm-7 col-md-8">
                <div class="clearfix">
                    <div class="col-sm-12 col-md-10 col-md-offset-2">
                        <div class="logo-title-container">
                            <div class="copy animated fadeIn">
                                <h1>{{ setting('admin_title', config('core.base.general.base_name')) }}</h1>
                                <p>{!! clean(trans('core/base::layouts.copyright', ['year' => now()->format('Y'), 'company' => setting('admin_title', config('core.base.general.base_name')), 'version' => get_cms_version()])) !!}</p>
                            </div>
                        </div> <!-- .logo-title-container -->
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-5 col-md-4 login-sidebar bg-dark">
                <div class="login-container">
                    @if (setting('admin_logo') || config('core.base.general.logo'))
                        <div class="mb-3">
                            <a href="{{ route('public.index') }}">
                                <img src="{{ setting('admin_logo') ? RvMedia::getImageUrl(setting('admin_logo')) : url(config('core.base.general.logo')) }}" alt="logo" class="img-fluid" />
                            </a>
                        </div>
                    @endif
                    @yield('content')

                    <div class="clearfix"></div>

                </div> <!-- .login-container -->

            </div> <!-- .login-sidebar -->
        </div> <!-- .row -->
    </div>
@stop
