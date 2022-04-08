@if (count($sliders) > 0)
<!-- Slide main -->
<div class="wrapSlideMain">
    <div class="contentSlideMain">
        <div class="dotsSlide1 showSlideMain">
            @foreach($sliders as $slider)
                <div class="elementSlideMain">
                    <div class="linkElement">
                        <div class="wrapImgSlideMain">
                            <img src="{{ RvMedia::getImageUrl($slider->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $slider->name }}" />
                        </div>

                        <div class="wrapTextSlideMain">
                            <div class="container-xl containerTextSlideMain">
                                <div class="contentTextSlideMain">
                                    <div class="titleMainOnSlideMain">{{ $slider->title }}</div>

                                    <div class="wrapDescriptionPostSlideMain">{{ $slider->description }}</div>
                                    @if ($slider->link)
                                        <div class="wrapBtn1 wrapBtnReadMoreSlide">
                                            <a href="{{ url($slider->link) }}" class="btn1 btnReadMoreSlide" title="{{ __('Read more') }}">{{ __('Read more') }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end Slide main -->
@endif
