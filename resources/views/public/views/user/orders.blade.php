@extends('public.index')

@section('title', 'Đơn hàng đã đặt')

@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li class="active">Đơn hàng đã đặt</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed" id="tableCart">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Mã đơn hàng</td>
                        <td class="description">Người nhận</td>
                        <td >Tổng tiền</td>
                        <td class="quantity">Ngày đặt</td>
                        <td class="total">Trạng thái</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->count() > 0)
                        @foreach ($data as $item)
                            <tr class="product">
                                <td class="cart_product">
                                    <a href="{{ route('public.user.detailbill', $item->code) }}">{{ $item->code }}</a>
                                </td>
                                <td >
                                    <h4>{{ $item->name }}</h4>
                                </td>
                                <td >
                                    <p>{{ number_format($item->total, 0, ",", ".") }}.000 ₫</p>
                                </td>
                                <td class="cart_quantity">
                                    <p>{{ date("d-m-Y", strtotime($item->created_at) ) }}</p>
                                </td>
                                <td class="cart_total">
                                    @if (!empty($item->delivery_date))
                                        <p class="text-success">Đơn đã giao thành công</p>
                                    @else
                                        <p class="text-warning">Đơn đang vận chuyển</p>
                                    @endif
                                </td>
                                <td class="cart_delete">
                                    <a href="{{ route('public.user.detailbill', $item->code) }}" class="btn border btn-outline-warning"><i class="fa-solid fa-info px-2"></i></a>
                                    <button type="button" class="btn border btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="6"><strong>Bạn chưa đặt đơn nào</strong></td>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="float-right mb-5">
            {{ $data->links() }}
        </div>

    </div>
</section> <!--/#cart_items-->
@stop

