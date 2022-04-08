
@if (view()->exists(Theme::getThemeNamespace() . '::views.templates.' . $page->template))
    @include(Theme::getThemeNamespace() . '::views.templates.' . $page->template)
@else
    {!! Theme::partial('breadcrumb', ['image' => $page->image, 'title' => $page->name]) !!}

    {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, clean($page->content), $page) !!}
@endif
