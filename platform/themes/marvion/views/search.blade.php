@php
    Theme::asset()->add('article-list-css', 'assets/css/article-list.css');
@endphp

<!-- search posts -->
<div class="wrapNews">
    <div class="container-xl containerNews">
        <div class="contentNews">
            <div class="justify-content-center listItemNews">
                @if ($posts->count() > 0)
                    @foreach ($posts as $item)
                        {!! Theme::partial('blog.posts.item', ['item' => $item, 'loop' => $loop]) !!}
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<!-- end search posts -->
