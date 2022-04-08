@if ($shortCode->block_alias)
@php
    $block = app(Platform\Block\Repositories\Interfaces\BlockInterface::class)->getFirstBy([
        'status' => Platform\Base\Enums\BaseStatusEnum::PUBLISHED,
        'alias'  => $shortCode->block_alias
    ]);
@endphp
@if ($block)
<!-- buy -->
<div class="wrapBuy">
    <div class="container-xl containerBuy">
        <div class="clearfix contentBuy">
            <div class="row align-items-center rowItemBuy">
                <div class="col-lg-5 colBannerBuy">
                    @if ($shortCode->image)
                        <div class="wrapBannerBuy">
                            <img src="{{ RvMedia::getImageUrl($shortCode->image) }}" class="imgBannerBuy" alt="{{ $block->name }}" />
                        </div>
                    @endif
                </div>

                <div class="col-lg-7 colTextBuy">
                    <div class="contentTextBuy">
                        <h2 class="titleItemBuy">{{ $block->name }}</h2>

                        @if ($shortCode->date && $shortCode->time)
                            @php
                                $datetime = '';
                                try {
                                    $datetime = now()->createFromFormat('m/d/Y H:i', $shortCode->date . ' ' . $shortCode->time);
                                } catch (Exception $ex) {
                                    
                                }
                            @endphp
                            @if ($datetime)
                                @if (now()->lt($datetime))
                                    <h2 class="wrapTitleTime">{!! clean(nl2br($block->description)) !!}</h2>
                                    <div class="countdown" data-countdown-to="{{ $datetime->format('c') }}"></div>
                                @else
                                    @if ($shortCode->purchase_link)
                                        <div class="clearfix wrapLogoAndBtnBuy">
                                            <div class="logoOkex">
                                                <p class="titleAvailable">{{ __('Now available on') }}</p>

                                                <img src="{{ RvMedia::getImageUrl($shortCode->representative_image, null, false, '/assets/images/logo/okex.png') }}" class="logoOkex" alt="logo" />
                                            </div>

                                            <a target="_blank" href="{{ $shortCode->purchase_link }}" class="btnBuy" title="{{ __('BUY NOW') }}">{{ __('BUY NOW') }}</a>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        @endif


                        <div class="wrapTextBuy">
                            {!! clean($block->content) !!}
                        </div>

                        <div class="wrapSlideLogoBuy">
                            <div class="showSlideLogoBuy">
                                @foreach (explode(',', $shortCode->gallery_images) as $item)
                                    @if ($item)
                                        <div class="itemSlideLogoBuy">
                                            <div class="wrapImgPartner">
                                                <div class="wrapImgResize img16And9"><img src="{{ RvMedia::getImageUrl($item) }}" class="imgPartner" alt="partner"></div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end buy -->
@endif
@endif
