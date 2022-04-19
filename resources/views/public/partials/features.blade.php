@php
    $productFeatures = getFeatures();
@endphp

<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Sản phẩm nổi bật</h2>

    @foreach ($productFeatures as $item)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ $item->thumbnail }}" alt="" />
                            <h2>{{number_format($item->price,0,",",".")}}.000 ₫</h2>
                            <p ><a href="{{ route('public.productDetail', $item->code) }}" class="text-secondary">{{ $item->name }}</a></p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{number_format($item->price,0,",",".")}}.000 ₫</h2>
                                <p><a href="{{ route('public.productDetail', $item->code) }}">{{ $item->name }}</a></p>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $item->code }}" name="code">
                                    <button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                                </form>
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
