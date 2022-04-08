<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        {!! Theme::header() !!}
    </head>

    <body>
        {!! apply_filters(THEME_FRONT_BODY, null) !!}
        <!-- header -->
        <div class="wrapHeader">
            <div class="contentHeader">
                <div class="headerBottom">
                    <div class="container-xl containerHeaderBottom">
                        <div class="clearfix contentHeaderBottom">
                            <h1 class="wrapLogoHeader">
                                {{ theme_option('site_name') }}
                                <a class="linkLogoHeader" href="{{ route('public.index') }}" title="{{ theme_option('site_name') }}">
                                    <img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" class="imgLogoHeader" alt="{{ theme_option('site_name') }}" />
                                </a>
                            </h1>

                            <div class="clearfix wrapSearchAndMenuCtr">
                                <div class="wrapBtnSearchHeader">
                                    <a href="#" title="Search" class="btnSearchHeader">
                                        <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z"></path>
                                        </svg>
                                    </a>
                                </div>
                                
                                <div class="wrapBtnCtrMenuHeader">
                                    <a href="#" class="btnCtrMenu" title="Menu">
                                        <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="iconMenu iconOpen">
                                            <path fill="currentColor" d="M442 114H6a6 6 0 0 1-6-6V84a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6z"></path>
                                        </svg>

                                        <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="iconMenu iconClose">
                                            <path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <div class="wrapCloseMenuHeaderMobile"></div>

                            <div class="wrapMenuMainHeader">
                                {!!
                                    Menu::renderMenuLocation('main-menu', [
                                        'options' => ['class' => 'clearfix listMenuMainHeader'],
                                        'view'    => 'menu.main',
                                    ])
                                !!}

                                <div class="wrapAboutHeader">
                                    <div class="contentAboutHeader">
                                        <div class="showAboutHeader">
                                            <div class="wrapLogoAboutHeader"><img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="{{ theme_option('site_name') }}" /></div>
                                            <div class="wrapTextAboutHeader">{{ theme_option('description_header') }}</div>
                                            <div class="listLinkFanpageAboutHeader">
                                                {!! Theme::partial('socials') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header -->
