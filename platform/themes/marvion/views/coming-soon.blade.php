@php
    SeoHelper::setTitle(__('Coming Soon'));
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        <meta name="robots" content="noindex,nofollow,noarchive" />
    
        {!! Theme::header() !!}

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/assets/css/fonts-coming-soon.css" />
        <link rel="stylesheet" type="text/css" href="/assets/css/coming-soon.css" />
    </head>

    <body>
        <header id="site-header">
            <h1 id="site-logo">
                {{ theme_option('site_name') }}
                <img src="{{ RvMedia::getImageUrl(theme_option('logo'), null, false, '/assets/images/logo/top.png') }}" alt="Marvion" />
            </h1>
            
            <div id="site-headline">{!! clean(nl2br(Arr::get($data, 'coming_soon.message'))) !!}</div>    
        </header>

        <section id="countdown-block">
            <div class="container" id="sandglass-wrap">
                <div id="sandglass">
                    <div class="sand-half">
                        <div class="part-top sand-part"></div>
                    </div>
                    <div class="sand-half">
                        <div class="part-bot sand-part"></div>
                    </div>
                </div>
            </div>
            <h3 id="countdown-label">{{ Arr::get($data, 'coming_soon.title', __('Our website is launching soon')) }}</h3>
            @php
                $datetime = '';
                if (Arr::get($data, 'coming_soon.date') && Arr::get($data, 'coming_soon.time')) {
                    try {
                        $datetime = now()->createFromFormat('m/d/Y H:i', Arr::get($data, 'coming_soon.date') . ' ' . Arr::get($data, 'coming_soon.time'));
                    } catch (Exception $ex) {
                        
                    }
                }
            @endphp
            @if ($datetime)
                <div id="countdown"></div>
                <script>
                    var SiteStartDate = "{{ $datetime->format('c') }}";
                </script>
            @endif
            
        </section>

        <aside id="social">
            <ul class="social-links">
                @if (theme_option('instagram'))
                    <li>
                        <a href="{{ theme_option('instagram') }}" target="_blank" title="Instagram">
                            <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                            </svg>
                        </a>
                    </li>
                @endif
                @if (theme_option('twitter'))
                    <li>
                        <a href="{{ theme_option('twitter') }}" target="_blank" title="Twitter">
                            <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                            </svg>
                        </a>
                    </li>
                @endif
                @if (theme_option('linkedin'))
                    <li>
                        <a href="{{ theme_option('linkedin') }}" target="_blank" title="LinkedIn">
                            <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path>
                            </svg>
                        </a>
                    </li>
                @endif
                @if (theme_option('telegram'))
                    <li>
                        <a href="{{ theme_option('telegram') }}" target="_blank" title="Telegram">
                            <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor" d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"></path>
                            </svg>
                        </a>
                    </li>
                @endif
                @if (theme_option('email'))
                    <li>
                        <a href="mailto:{{ theme_option('email') }}" target="_blank" title="email">
                            <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M464 64H48C21.5 64 0 85.5 0 112v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM48 96h416c8.8 0 16 7.2 16 16v41.4c-21.9 18.5-53.2 44-150.6 121.3-16.9 13.4-50.2 45.7-73.4 45.3-23.2.4-56.6-31.9-73.4-45.3C85.2 197.4 53.9 171.9 32 153.4V112c0-8.8 7.2-16 16-16zm416 320H48c-8.8 0-16-7.2-16-16V195c22.8 18.7 58.8 47.6 130.7 104.7 20.5 16.4 56.7 52.5 93.3 52.3 36.4.3 72.3-35.5 93.3-52.3 71.9-57.1 107.9-86 130.7-104.7v205c0 8.8-7.2 16-16 16z"></path>
                            </svg>
                        </a>
                    </li>
                @endif
            </ul>
        </aside>
	
        <div id="background-slideshow" class="main-bg">
            <img src="/assets/images/coming-soon/bg-slide1.jpg" alt="Marvion" />
            <img src="/assets/images/coming-soon/bg-slide2.jpg" alt="Marvion" />
            <img src="/assets/images/coming-soon/bg-slide4.jpg" alt="Marvion" />
            <img src="/assets/images/coming-soon/bg-slide3.jpg" alt="Marvion" />
        </div>

        <!-- Preloader -->
	    <div id="preloader" style="background-image: url(/assets/images/coming-soon/circles.svg);"></div>

        <!-- JS -->
        <script src="/assets/js/coming-soon.js"></script>
        {!! Theme::footer() !!}
    </body>
</html>
