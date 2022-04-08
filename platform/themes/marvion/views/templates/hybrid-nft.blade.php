@php
    Theme::asset()->add('hybrid-css', 'assets/css/hybrid.css', [], [], '1.0.1');
    Theme::asset()->container('footer')->add('hybrid-js', 'assets/js/hybrid.js', [], [], '1.0.1');
@endphp
{!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, clean($page->content), $page) !!}
