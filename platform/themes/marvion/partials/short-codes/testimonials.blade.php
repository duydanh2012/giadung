@php
    $testimonials = get_list_testimonials(['status' => Platform\Base\Enums\BaseStatusEnum::PUBLISHED]);
@endphp
@if ($testimonials->count())
    <!-- testimonal -->
    <div class="wrapTestimonal">
        <div class="container-xl containerTestimonal">
            <div class="contentTestimonal">
                <div class="row rowTestimonal">
                    <div class="col-sm-2 colIconTestimonal">
                        <div class="wrapIconTestimonal">
                            <img src="{{ RvMedia::getImageUrl($shortCode->image, null, false, '/assets/images/icons/testimonialsbg.png') }}" alt="Testimonal" />
                        </div>
                    </div>

                    <div class="col-sm-10 colTextTestimonal">
                        <div class="contentTextTestimonal">
                            <div class="dotsSlide1 showSlideTestimonal">
                                @foreach ($testimonials as $item)
                                    <div class="itemTestimonal">
                                        <div class="wrapTextTestimonal">{!! clean($item->content) !!}</div>

                                        <div class="wrapInfoUser">
                                            {{ $item->name }}<br>
                                            {{ $item->company }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end testimonal -->
@endif
