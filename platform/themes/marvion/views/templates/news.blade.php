@php
    Theme::asset()->add('article-list-css', 'assets/css/article-list.css', [], [], '1.0.1');
@endphp
{!! Theme::partial('breadcrumb', ['image' => $page->image, 'title' => $page->name]) !!}

@php
    $posts = get_all_posts(
        true,
        theme_option('number_of_posts_in_a_category', 12),
        ['slugable', 'categories', 'categories.slugable', 'author']
    );
@endphp

<!-- news -->
<div class="wrapNews">
    <div class="container-xl containerNews">
        <div class="contentNews">
            <div class="justify-content-center listItemNews">
                @foreach ($posts as $item)
                    {!! Theme::partial('blog.posts.item', ['item' => $item, 'loop' => $loop]) !!}
                @endforeach
            </div>

            <!-- <div class="clearfix wrapPaggingList">
                <a href="#" class="linkPagging prev" title="Previus">
                    <span>
                        <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor" d="M229.9 473.899l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L94.569 282H436c6.627 0 12-5.373 12-12v-28c0-6.627-5.373-12-12-12H94.569l155.13-155.13c4.686-4.686 4.686-12.284 0-16.971L229.9 38.101c-4.686-4.686-12.284-4.686-16.971 0L3.515 247.515c-4.686 4.686-4.686 12.284 0 16.971L212.929 473.9c4.686 4.686 12.284 4.686 16.971-.001z"></path>
                        </svg>
                    </span>
                </a>

                <a href="#" class="linkPagging active" title="1">
                    <span>01</span>
                </a>

                <a href="#" class="linkPagging" title="2">
                    <span>02</span>
                </a>

                <a href="#" class="linkPagging" title="3">
                    <span>03</span>
                </a>

                <a href="#" class="linkPagging" title="4">
                    <span>04</span>
                </a>

                <a href="#" class="linkPagging" title="5">
                    <span>05</span>
                </a>
                
                <a href="#" class="linkPagging next" title="Next">
                    <span>
                        <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor" d="M218.101 38.101L198.302 57.9c-4.686 4.686-4.686 12.284 0 16.971L353.432 230H12c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h341.432l-155.13 155.13c-4.686 4.686-4.686 12.284 0 16.971l19.799 19.799c4.686 4.686 12.284 4.686 16.971 0l209.414-209.414c4.686-4.686 4.686-12.284 0-16.971L235.071 38.101c-4.686-4.687-12.284-4.687-16.97 0z"></path>
                        </svg>
                    </span>
                </a>
            </div> -->
        </div>
    </div>
</div>
<!-- end news -->
