{!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, clean($page->content), $page) !!}

<!-- modal confirm terms and conditions -->
<div class="modal fade modalConfirmTermsConditions modalControl" id="modalConfirmTermsConditions" tabindex="-1" aria-labelledby="modalConfirmTermsConditions" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <a href="#" class="btnCloseModal" data-dismiss="modal" title="Close">
                    <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"></path>
                    </svg>
                </a>
                
                <div class="title4 titleConfirmTermsConditions">please confirm</div>

                <div class="wrapTextModalControl">
                    <p>By using this site, you agree to our <a href="#showTextTermsConditions" title="Terms and Conditions">Terms and Conditions</a>, including Cookie Use</p>
                </div>

                <div class="wrapBtn1 wrapBtnConfirm">
                    <a href="javascript:void(0);" class="btn1 btnConfirm" title="Yes">Yes</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end modal confirm terms and conditions -->

@if (theme_option('terms_n_conditions_page_id'))
@php
    $page = app(\Platform\Page\Repositories\Interfaces\PageInterface::class)->findById(theme_option('terms_n_conditions_page_id'));
@endphp
@if ($page)
<!-- modal text terms and conditions -->
<div class="modal fade modalTextTermsConditions modalControl" id="modalTextTermsConditions" tabindex="-1" aria-labelledby="modalConfirmTermsConditions" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <a href="#" class="btnCloseModal" data-dismiss="modal" title="Close">
                    <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"></path>
                    </svg>
                </a>
                
                <div class="title4 titleItem">{{ $page->name }}</div>

                <div class="wrapOverText">
                    <div class="wrapTextModalControl">
                        {!! clean($page->content) !!}
                    </div>
                </div>

                <div class="listBtnConfirm">
                    <div class="wrapBtn1 wrapBtnConfirm">
                        <a href="javascript:void(0);" class="btn1 btnCheck btnAgree" title="I agree">I agree</a>
                    </div>

                    <div class="wrapBtn1 wrapBtnConfirm">
                        <a href="javascript:void(0);" class="btn1 btnCheck btnDisagree" title="I disagree">I disagree</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end modal text terms and conditions -->
@endif
@endif
