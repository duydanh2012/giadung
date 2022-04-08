
        <!-- footer -->
        <div class="wrapFooter">
            @if (theme_option('footer_logo'))
            <div class="wrapLogoFooterBoder">
                <div class="wrapLogFooter">
                    <img src="{{ RvMedia::getImageUrl(theme_option('footer_logo')) }}" alt="{{ theme_option('site_name') }}" />
                </div>
            </div>
            @endif
            
            <div class="contentFooter">
                <div class="container-xl containerFooter">
                    <div class="row rowFooter">
                        <div class="col-sm-6 col-lg-3 colContactFooter">
                            <div class="contentContactFooter">
                                <div class="titleFooter">{{ __('Contact') }}</div>

                                <div class="wrapTextContactFooter">
                                    @if (theme_option('address'))
                                        <p><span title="{{ theme_option('address') }}"><b>{{ __('Address') }}:</b> {{ theme_option('address') }}</span></p>
                                    @endif
                                    @if (theme_option('hotline'))
                                        <p><a href="tel:{{ theme_option('hotline') }}" title="{{ theme_option('hotline') }}"><b>{{ __('Hotline') }}:</b> {{ theme_option('hotline') }}</a></p>
                                    @endif
                                    @if (theme_option('email'))
                                        <p><a href="mailto:{{ theme_option('email') }}" title="{{ theme_option('email') }}"><b>{{ __('Email') }}:</b> {{ theme_option('email') }}</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {!! dynamic_sidebar('footer_sidebar') !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- end footer -->

        <!-- copyright -->
        <div class="wrapCopyright">
            <div class="container-xl">
                <div class="wrapText">{{ theme_option('copyright') }}</div>
            </div>
        </div>
        <!-- end copyright -->

        <!-- btn scroll top -->
        <a href="javascript:void(0)" title="Top" class="btnScrollTop">
            <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path>
            </svg>
        </a>
        <!-- end btn scroll top -->

        <!-- search popup -->
        <div class="wrapSearchPopup">
            <div class="contentSearchPopup">
                <a href="javascript:void(0);" title="Close" class="btnClosrSearchPopup">
                    <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="iconMenu iconClose">
                        <path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"></path>
                    </svg>
                </a>

                <div class="wrapFrmSearchPopup">
                    <div class="clearfix contentFrmSearchPopup">
                        <form action="{{ route('public.search') }}" method="get">
                            <input type="text" name="q" class="inputSearchPopup" placeholder="Search for..." />

                            <button type="submit" class="btnSendSearchPopup" title="Search">
                                <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="iconSearch iconOpen">
                                    <path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end search popup -->

        <!-- modal text FAQ -->
        <div class="modal fade modalTextFAQ modalControl" id="modalTextFAQ" tabindex="-1" aria-labelledby="modalTextFAQ" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <a href="#" class="btnCloseModal" data-dismiss="modal" title="Close">
                            <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"></path>
                            </svg>
                        </a>
                        
                        <div class="titleModalControl">Can I submit my media for consideration</div>

                        <div class="wrapTextModalControl">
                            <p>Yes, send us a demo and we will get in touch with you as soon as we can. If Marvion likes what you have submitted, Marvion will offer a price to take full ownership of the intellectual property relating to your media</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal text FAQ -->

        {!! Theme::footer() !!}
    </body>
</html>
