@php
    $productFeatures = getAllProduct(9);
@endphp

<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Tất cả sản phẩm</h2>

    @foreach ($productFeatures as $item)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ asset($item->thumbnail) }}" alt="" style="height: 300px"/>
                            <h2>{{number_format($item->price,0,",",".")}}.000 ₫</h2>
                            <p ><a href="{{ route('public.productDetail', $item->code) }}" class="text-secondary">{{ $item->name }}</a></p>
                            <a href="javascript:void(0);" data-href="{{ route('cart.store') }}" data-value="{{ $item->code }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{number_format($item->price,0,",",".")}}.000 ₫</h2>
                                <p><a href="{{ route('public.productDetail', $item->code) }}">{{ $item->name }}</a></p>
                                <a href="javascript:void(0);" data-href="{{ route('cart.store') }}" data-value="{{ $item->code }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                        @if ($item->new == 1)
                            <img src="{{ asset('assets/fontend/images/new.png') }}" class="new" alt="">
                        @endif
                        
                </div>
            </div>
        </div>
    @endforeach
    
</div><!--features_items-->
{{ $productFeatures->links('public.layouts.pagination') }}
