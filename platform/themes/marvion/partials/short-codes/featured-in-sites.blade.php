@php
    $featuresIn = get_list_features_in();
@endphp
 <!-- featured in -->
 @if ($featuresIn->count())
 <div class="wrapFeatiredIn">
    <div class="container-xl containerElement">    
        <div class="contentElement">
            <h2 class="title1 titleItem">{{ $shortCode->title }}</h2>

            <div class="wrapSlideItem">
                <div class="showSlideItem">
                    @foreach ($featuresIn as $item)
                        <div class="itemSlide">
                            <div class="contentItemSlide">
                                <div title="{{ $item->name }}" class="wrapImgResize img16And9 imgLink">
                                    <img src="{{ RvMedia::getImageUrl($item->image) }}" alt="{{ $item->name }}" />
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end featured in -->
 @endif
