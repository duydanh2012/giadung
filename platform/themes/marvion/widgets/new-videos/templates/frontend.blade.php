@if (function_exists('get_new_products'))
    @php
        $products = get_new_products();
    @endphp

    @if ($products->count() > 0)
        <div class="col-sm-6 col-lg-3 colVideosFooter">
            <div class="contentVideosFooter">
                <div class="titleFooter">New Videos</div>

                <div class="row rowVideosFooter">
                    @foreach ($products as $product)
                        <div class="col-4 colVideoFooter" data-iframe="true" data-src="{{ $product->link }}">
                            <a href="javascript:void(0);" title="{{ $product->name }}" class="contentVideoFooter">
                                <div class="wrapImgResize imgSquare wrapImgVideoFooter">
                                    <img src="{{ RvMedia::getImageUrl($product->image) }}" alt="{{ $product->name }}" />

                                    <div class="wrapBgAnimateVideoFooter" style="background-image: url(assets/images/background/noise.png);"></div>
                                </div>

                                <div class="iconVideoFooter">
                                    <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path fill="currentColor" d="M336.2 64H47.8C21.4 64 0 85.4 0 111.8v288.4C0 426.6 21.4 448 47.8 448h288.4c26.4 0 47.8-21.4 47.8-47.8V111.8c0-26.4-21.4-47.8-47.8-47.8zm189.4 37.7L416 177.3v157.4l109.6 75.5c21.2 14.6 50.4-.3 50.4-25.8V127.5c0-25.4-29.1-40.4-50.4-25.8z"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endif
