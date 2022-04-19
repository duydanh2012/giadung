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
            <table class="table table-condensed">
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
                    @foreach ($data as $item)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{ $item->attributes->thumbnail }}" alt="" style="max-width: 100px; max-height: 70px;"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ route('public.productDetail',  $item->attributes->code) }}">{{ $item->name }}</a></h4>
                                <p>Mã SP: {{ $item->code }}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{ number_format($item->price,0,",",".") }}.000 ₫</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href="" data-quantity="minus" data-field="quantity"> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{ $item->quantity }}" autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href=""> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{ number_format($item->price * $item->quantity,0,",",".") }}.000 ₫</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
@stop

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.cart_quantity_up').click(function(e){
                e.preventDefault();
                
                fieldName = $(this).attr('data-field');
                
                // Get its current value
                var currentVal = parseInt($('input[name='+fieldName+']').val());
                // If is not undefined
                if (!isNaN(currentVal)) {
                    // Increment
                    $('input[name='+fieldName+']').val(currentVal + 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name='+fieldName+']').val(0);
                }
            });

            // This button will decrement the value till 0
            $('[data-quantity="minus"]').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('data-field');
                // Get its current value
                var currentVal = parseInt($('input[name='+fieldName+']').val());
                // If it isn't undefined or its greater than 0
                if (!isNaN(currentVal) && currentVal > 0) {
                    // Decrement one
                    $('input[name='+fieldName+']').val(currentVal - 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name='+fieldName+']').val(0);
                }
            });
        });
    </script>
@stop
