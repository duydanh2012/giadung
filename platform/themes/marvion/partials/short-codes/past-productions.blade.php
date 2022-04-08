@if (function_exists('get_list_products'))
    @php
        $products = get_list_products();
    @endphp
    @if ($products->count() > 0)
        <!-- music clip -->
        <div class="wrapMusicClip">
            <div class="container-xl containerMusicClip">
                <div class="contentMusicClip">                        
                    <h2 class="title1 titleItemMusicClip">{{ $shortCode->title }}</h2>
                </div>
            </div>
            @php
                $chunk = $products->chunk(ceil($products->count() / 2));
            @endphp
            @foreach ($chunk as $group)
                <div class="wrapListSlideMusicClip">
                    <div class="showSlideMusicClip">
                        @foreach ($group as $product)
                            <div class="itemSlideMusicClip" data-iframe="true" data-src="{{ $product->link }}">
                                <a href="javascript:void(0);" title="{{ $product->name }}" class="contentItemMusicClip">
                                    <div class="wrapImgResize img16And9">
                                        <img src="{{ RvMedia::getImageUrl($product->image) }}" alt="{{ $product->name }}" />
                                    </div>

                                    <div class="iconPlayBorder">
                                        <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6zm-16.2 55.1l-352 208C45.6 483.9 32 476.6 32 464V47.9c0-16.3 16.4-18.4 24.1-13.8l352 208.1c10.5 6.2 10.5 21.4.1 27.6z"></path>
                                        </svg>
                                    </div>

                                    <div class="iconPlayContent">
                                        <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <!-- end music clip -->
    @endif
@endif

