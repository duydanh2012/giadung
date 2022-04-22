@extends('public.index')

@section('title', 'Đơn hàng đã đặt')

@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li><a href="{{ route('public.user.list') }}">Đơn hàng đã đặt</a></li>
              <li class="active">Chi tiết đơn hàng</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <p>
                <span><i>Mã đơn hàng: {{ $bill->code }}</i></span> 
                <span class="ml-3">
                    <i>
                        @if (!empty($bill->delivery_date))
                            Ngày nhận hàng: {{ date("d-m-Y", strtotime($bill->delivery_date) ) }}
                        @else
                            Trạng thái: Đang vận chuyển
                        @endif
                    </i>
                </span>
                @if (empty($bill->delivery_date))
                    <a href="{{ route('public.user.confirm', $bill->code) }}" class="btn btn-success float-right">Nhận Hàng</a>
                @endif
            </p>
            <table class="table table-condensed" id="tableCart">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Tên</td>
                        <td >Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->count() > 0)
                        @foreach ($data as $item)
                            <tr class="product">
                                <td class="cart_product">
                                    <img src="{{ asset($item->product->thumbnail) }}" alt="" style="max-width: 100px; max-height: 70px;">
                                </td>
                                <td class="cart_description">
                                    <h4>{{ $item->product->name }}</h4>
                                </td>
                                <td class="cart_price">
                                    <p>{{ number_format($item->price, 0, ",", ".") }}.000 ₫</p>
                                </td>
                                <td class="cart_quantity">
                                    <p>{{ $item->number }}</p>
                                </td>
                                <td class="cart_total">
                                    <p>{{ number_format($item->price * $item->number, 0, ",", ".") }}.000 ₫</p>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="5"><strong>Đơn hàng trống</strong></td>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
@stop

