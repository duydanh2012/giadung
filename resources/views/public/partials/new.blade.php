@php
    $products = getProductNew()->toArray();

    $products = array_chunk($products, 3, true);
@endphp
<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Sản phẩm mới</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($products as $key => $value)
                <div class="item @if($key == 0) active @endif">	
                    @foreach ($value as $item)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ asset($item['thumbnail']) }}" alt="" style="width: 100px; max-height: 120px" />
                                        <h2>{{ number_format($item['price'],0,",",".") }}.000 ₫</h2>
                                        <p ><a href="{{ route('public.productDetail', $item['code']) }}" class="text-secondary">{{ $item['name'] }}</a></p>
                                        <a href="javascript:void(0);" data-href="{{ route('cart.store') }}" data-value="{{ $item['code'] }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>			
    </div>
</div><!--/recommended_items-->
