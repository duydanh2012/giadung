@php
    Theme::asset()->add('faq-css', 'assets/css/faq.css', [], [], '1.0.1');
    Theme::asset()->container('footer')->add('faq-js', 'assets/js/faq.js', [], [], '1.0.1');
@endphp
{!! Theme::partial('breadcrumb', ['image' => $page->image, 'title' => $page->name]) !!}

<!-- faq -->
@php
    $faqGroups = get_all_faq_groups([], ['items']);
@endphp
<div class="wrapFAQ">
    <div class="container-xl containerFAQ">
        <div class="contentFAQ">
            <div class="row align-items-center rowFAQ">
                @foreach ($faqGroups as $group)
                <div class="col-sm-6 col-lg-4 colItemFAQ">
                    <div class="contentItemFAQ @if ($loop->first) active @endif">
                        <div class="contentTitleFAQ">
                            <h2 class="titleHeadingItemFAQ">
                                <a href="javascript:void(0);" class="linkItemFAQ" title="{{ $group->name }}">{{ $group->name }}</a>
                            </h2>
                        </div>

                        <div class="listQuestion">
                            @foreach ($group->items as $item)
                            <div class="itemQuestion">
                                <div class="numberItemFAQ">{{ ($loop->index < 9 ? '0' : '') . ($loop->index + 1) }}.</div>

                                <h3 class="titleHeadingItemFAQ">
                                    <a href="javascript:void(0);" class="linkItemFAQ" data-toggle="modal"
                                        data-target="#modalTextFAQ_{{ $item->id }}" title="{{ $item->name }}">{{ $item->name }}</a>
                                </h3>

                                <a href="javascript:void(0);" class="btn2 btnFAQ" data-toggle="modal"
                                    data-target="#modalTextFAQ_{{ $item->id }}" title="{{ __('Read more') }}">
                                    <svg class="iconLeft" aria-hidden="true" focusable="false" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                            d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6zM48 453.5v-395c0-4.6 5.1-7.5 9.1-5.2l334.2 197.5c3.9 2.3 3.9 8 0 10.3L57.1 458.7c-4 2.3-9.1-.6-9.1-5.2z">
                                        </path>
                                    </svg>
                                    {{ __('Read more') }}
                                    <svg class="iconRight" aria-hidden="true" focusable="false" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                            d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6zM48 453.5v-395c0-4.6 5.1-7.5 9.1-5.2l334.2 197.5c3.9 2.3 3.9 8 0 10.3L57.1 458.7c-4 2.3-9.1-.6-9.1-5.2z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            @endforeach
                        
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- end faq -->

@foreach ($faqGroups as $group)
    @foreach ($group->items as $item)
        <!-- modal text FAQ -->
        <div class="modal fade modalTextFAQ modalControl" id="modalTextFAQ_{{ $item->id }}" tabindex="-1" aria-labelledby="modalTextFAQ"
        aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <a href="#" class="btnCloseModal" data-dismiss="modal" title="Close">
                            <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 320 512">
                                <path fill="currentColor"
                                    d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z">
                                </path>
                            </svg>
                        </a>

                        <div class="titleModalControl">{{ $item->name }}</div>

                        <div class="wrapTextModalControl">
                            {!! clean($item->content) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal text FAQ -->
    @endforeach
@endforeach
