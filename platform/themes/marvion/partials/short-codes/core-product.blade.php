@php
    $coreProducts = get_list_core_products();
@endphp
@if ($coreProducts->count())
<!-- products -->
<div class="wrapProducts">
    <div class="container-xl containerProducts">
        <div class="clearfix contentProducts">
            <h2 class="title2 titleItemProducts">{{ $shortCode->title }}</h2>

            <div class="wrapSlieCoreProduct">
                <div class="showSlieCoreProduct">
                    @foreach ($coreProducts as $item)
                        <div class="colItemProducts">
                            <div class="contentItemProduct">
                                <div class="wrapImgItemProduct">
                                    <div class="wrapImgResize imgSquare linkImgItemproduct" title="{{ $item->name }}">
                                        <img src="{{ RvMedia::getImageUrl($item->image) }}" alt="{{ $item->name }}" class="imgItemProduct" />
                                    </div>
                                </div>
                                <h3 class="titleItemProduct"><div class="linkTitleItemproduct" title="{{ $item->name }}">{{ $item->name }}</a></h3>
                                <p class="desItemProduct">{{ $item->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end products -->
@endif
