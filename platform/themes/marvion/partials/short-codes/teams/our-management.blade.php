@php
    $teams = get_list_our_managements();
@endphp
@if ($teams->count())
<!-- our manager -->
<div class="wrapManager Team">
    <div class="container-xl containerManager">
        <div class="contentManager">                        
            <h2 class="title1 titleItemManager">{{ $shortCode->title }}</h2>
        </div>
    </div>

    <div class="wrapSlideManager">
        <div class="row justify-content-center showSlideManager">
            @foreach ($teams as $item)
                <div class="col-6 col-sm-4 col-lg-2 itemSlideManager">
                    <div class="contentItemManager">
                        <div class="wrapImgResize img9And16 wrapImgManager" data-toggle="modal" data-target="#modalTextManagement_{{ $item->id }}">
                            <img src="{{ RvMedia::getImageUrl($item->image) }}" alt="{{ $item->name }}" />

                            <div class="wrapBgAnimateManager" style="background-image: url(/assets/images/background/noise.png);"></div>
                        </div>

                        <div class="wrapTextSlideManager">
                            <div class="typeManagerSlide">{{ $item->position }}</div>

                            <h3 class="titleHeadingSlidemanager">
                                <a href="javascript:voi(0);" data-toggle="modal" data-target="#modalTextManagement_{{ $item->id }}" title="{{ $item->name }}" class="linkTitlemManager">{{ $item->name }}</a>
                            </h3>

                            <div class="linkFollowManagerSlide">
                                @foreach (config('plugins.team.general.socials') as $key => $social)
                                    @if ($link = Arr::get($item->socials, $key))
                                        <a href="{{ $link }}" target="_blank" class="linkFanpageAboutHeader" title="{{ $social['label'] }}">{{ $social['icon'] }}.</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal text manager -->
                <div class="modal fade modalTextManagement modalControl" id="modalTextManagement_{{ $item->id }}" tabindex="-1" aria-labelledby="modalConfirmTermsConditions" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <a href="#" class="btnCloseModal" data-dismiss="modal" title="Close">
                                    <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                        <path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"></path>
                                    </svg>
                                </a>
                                
                                <div class="row rowTextManager">
                                    <div class="col-sm-3 colImgManaer">
                                        <div class="contentImgManager">
                                            <div class="wrapImgResize img9And16">
                                                <img src="{{ RvMedia::getImageUrl($item->image) }}" alt="{{ $item->name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-9 colTextManager">
                                        <div class="contentTextManager">
                                            <div class="title4 titleModalControl">{{ $item->name }}</div>

                                            <div class="titleTypeManager">{{ $item->position }}</div>

                                            <div class="wrapTextModalControl">
                                                {!! $item->content !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal text manager -->
            @endforeach
        </div>
    </div>
</div>
@endif
