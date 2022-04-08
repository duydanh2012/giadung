@if ($shortCode->block_alias)
@php
    $block = app(Platform\Block\Repositories\Interfaces\BlockInterface::class)->getFirstBy([
        'status' => Platform\Base\Enums\BaseStatusEnum::PUBLISHED,
        'alias'  => $shortCode->block_alias
    ]);
@endphp
@if ($block)
    <!-- about -->
    <div class="wrapAboutHome">
        <div class="container-xl containerAboutHome">
            <div class="clearfix contentAboutHome">
                <h2 class="titleAboutHome">{{ $block->description }}</h2>
                <div class="clearfix wrapTextAndBtnAboutHome">
                    <div class="wrapTextAboutHome">{!! clean($block->content) !!}</div>
                    @if ($shortCode->link)
                        <div class="wrapBtn1 wrapBtnAboutHome">
                            <a href="{{ $shortCode->link }}" class="btn1 btnAboutHome" title="{{ __('Read more') }}">{{ __('Read more') }}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->

@endif
@endif
