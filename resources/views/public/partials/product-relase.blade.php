@php
    $data = getProductRelase($code);
@endphp
@if ($data->count() > 0)
    @foreach ($data as $item)
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ asset($item->thumbnail) }}" alt="" style="width: 100px; height: 120px"/>
                        <h2>{{ number_format($item->price,0,",",".") }}.000 ₫</h2>
                        <p>{{ $item->name }}</p>
                        <a href="javascript:void(0);" data-href="{{ route('cart.store') }}" data-value="{{ $item->code }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
