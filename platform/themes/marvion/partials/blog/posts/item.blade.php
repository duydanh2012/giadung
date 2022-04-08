<div class="itemNews">
    <div class="row rowNews">
        <div class="col-sm-6 colImgNews">
            <a target="_blank" href="{{ $item->external_link }}" title="{{ $item->name }}" class="wrapImgResize img16And9 linkImgNews">
                <img src="{{ RvMedia::getImageUrl($item->image) }}" alt="{{ $item->name }}" />
            </a>
        </div>

        <div class="col-sm-6 colTextNews">
            <div class="contentTextNews">
                <div class="wrapNumberNews">
                    <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M400 64h-48V12c0-6.6-5.4-12-12-12h-8c-6.6 0-12 5.4-12 12v52H128V12c0-6.6-5.4-12-12-12h-8c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM48 96h352c8.8 0 16 7.2 16 16v48H32v-48c0-8.8 7.2-16 16-16zm352 384H48c-8.8 0-16-7.2-16-16V192h384v272c0 8.8-7.2 16-16 16zM148 320h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm96 0h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm96 0h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm-96 96h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm-96 0h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm192 0h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12z"></path>
                    </svg>
                    {{ $item->created_at->format('M d, Y') }}
                </div>
                <h3 class="titleHeaddingNews">
                    <a target="_blank" href="{{ $item->external_link }}" class="linkTitleNews" title="{{ $item->name }}">{{ $item->name }}</a>
                </h3>

                <p class="desItemNews">{{ $item->description }}</p>

                <div class="wrapBtn1 wrapBtnNews">
                    <a target="_blank" href="{{ $item->external_link }}" class="btn1 btnNews" title="{{ __('Read more') }}">{{ __('Read more') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
