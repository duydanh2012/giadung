@php
    $partners = get_list_partners(['status' => Platform\Base\Enums\BaseStatusEnum::PUBLISHED]);
@endphp
@if ($partners->count())
<!-- partners -->
<div class="wrapPartners">
    <div class="container-xl containerPartners">
        <div class="contentPartners">                    
            <h2 class="title2 titleItemProducts">{{ $shortCode->title }}</h2>
            <div class="showSlidePartners">
                @foreach ($partners as $item)
                    <div class="itemSlidePartners">
                        <div class="contentItemSlidePartner">
                            @if ($item->link)
                                <a href="{{ $item->link }}" title="{{ $item->name }}" class="wrapImgResize img16And9 linkPartnerSlide">
                                    <img src="{{ RvMedia::getImageUrl($item->image) }}" class="imgPartnerSlide" alt="{{ $item->name }}" />
                                </a>
                            @else
                                <div class="wrapImgResize img16And9 linkPartnerSlide">
                                    <img src="{{ RvMedia::getImageUrl($item->image) }}" class="imgPartnerSlide" alt="{{ $item->name }}" />
                                </div>
                            @endif
                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- end partners -->
@endif
