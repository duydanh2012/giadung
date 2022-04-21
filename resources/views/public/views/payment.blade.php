@extends('public.index')

@section('title', 'Thanh toán')

@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li class="active">Thanh toán</li>
            </ol>
        </div>

        @include('public.partials.payment', ['data' => $user])
    </div>
</section> <!--/#cart_items-->
@stop

@section('scripts')
<script src="{{ asset('assets/js/cart.js') }}"></script>
@stop
