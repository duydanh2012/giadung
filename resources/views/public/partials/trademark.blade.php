@php
    $trademarks = getProductWithTrademark();
@endphp
<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($trademarks as $item)
                @if ($item->products->count() > 0)
                    <li class="nav-item"><a class="nav-link @if($loop->first) class="active" @endif " href="#trademark-{{ $item->id }}" data-toggle="tab">{{ $item->name }}</a></li>
                @endif
            @endforeach

        </ul>
    </div>
    <div class="tab-content">
        @foreach ($trademarks as $item)
            @if ($item->products->count() > 0)
                <div class="tab-pane @if($loop->first) active @endif " id="trademark-{{ $item->id }}" >
                    @foreach ($item->products as $product)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ $product->thumbnail }}" alt="" style="width: 100px; height: 120px"/>
                                        <h2>{{ number_format($product->price,0,",",".") }}.000 ₫</h2>
                                        <p ><a href="{{ route('public.productDetail', $product->code) }}" class="text-secondary">{{ $product->name }}</a></p>
                                        <a href="javascript:void(0);" data-href="{{ route('cart.store') }}" data-value="{{ $product->code }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>
</div><!--/category-tab-->
