@php
    $data = [];
    if (is_file(storage_path('framework/down'))) {
        $data = json_decode(file_get_contents(storage_path('framework/down')), true);
    }
@endphp
@if (Arr::get($data, 'is_show_coming_soon') && view()->exists('theme.marvion::views.coming-soon'))
    @include('theme.marvion::views.coming-soon')
@else
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8" />
        <meta name="robots" content="noindex,nofollow,noarchive" />
        <title>{{ __('Maintenance mode') }}</title>
        <link rel="stylesheet" href="{{ asset('vendor/core/core/base/css/error-pages.css') }}">
    </head>

    <body>
        <div class="container">
            <h1>{{ __('Maintenance mode') }}</h1>
            <p>{{ __('Sorry, we are doing some maintenance. Please check back soon.') }}</p>
            @if (get_admin_email()->first())
                <p>{!! clean(__('If you need help, contact us at :mail.', ['mail' => Html::link('mailto:' .
                    get_admin_email()->first(), get_admin_email()->first())])) !!}</p>
            @endif
        </div>
    </body>

    </html>
@endif
