@extends('public.index')

@section('title', 'Giỏ hàng')

@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li class="active">Giỏ hàng</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed" id="tableCart">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Tên</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($data) --}}
                    @foreach ($data as $item)
                        <tr id="row-{{ $item->attributes->code }}" class="product">
                            <td class="cart_product">
                                <a href=""><img src="{{ $item->attributes->thumbnail }}" alt="" style="max-width: 100px; max-height: 70px;"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ route('public.productDetail',  $item->attributes->code) }}">{{ $item->name }}</a></h4>
                                <p>Mã SP: {{ $item->attributes->code }}</p>
                            </td>
                            <td class="cart_price">
                                <p id="price-{{ $item->attributes->code }}" data-price="{{ $item->price }}">{{ number_format($item->price,0,",",".") }}.000 ₫</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <input class="cart_quantity_input quantity" type="text" name="quantity" data-href="{{ route('cart.update') }}" data-id="{{ $item->attributes->code }}" value="{{ $item->quantity }}" autocomplete="off" size="2">
                                </div>
                            </td>
                            <td class="cart_total" width="20%">
                                <p class="cart_total_price" id="total-{{ $item->attributes->code }}" data-value="{{ $item->price * $item->quantity }}">{{ number_format($item->price * $item->quantity,0,",",".") }}.000 ₫</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="javascript:void(0);" data-href="{{ route('cart.delete') }}" data-id="{{ $item->attributes->code }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="">
                        <td >
                            <a class="btn cart_quantity_clear" href="javascript:void(0);" data-href="{{ route('cart.clear') }}" ><i class="fas fa-trash-alt"></i> Dọn dẹp giỏ hàng</a>
                        </td>
                        <td colspan="3"><strong>Tổng tiền:</strong></td>
                        <td id="bill_total"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a class="btn btn-primary float-right mb-5" href="{{ route('public.payment') }}" role="button">Tiến hành thanh toán</a>
    </div>
</section> <!--/#cart_items-->
<input type="hidden" name="error" id="noti_error" value="{{ session('error') ? session('error') : null }}">
<script>
    let err = document.getElementById('noti_error').value;

    if (err) {
        alert(err);
    }
</script>
@stop

@section('scripts')
<script src="{{ asset('assets/js/cart.js') }}"></script>
@stop
