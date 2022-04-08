<?php

use Platform\Theme\Theme;

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials" and "views"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => [

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function($theme)
        {
            // You can remove this line anytime.
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function (Theme $theme)
        {
            // Partial composer.
            // $theme->partialComposer('header', function($view) {
            //     $view->with('auth', \Auth::user());
            // });
            $version = '1.0.1';
            // You may use this event to set up your assets.
            $theme->asset()->add('lib-css', 'assets/css/lib.css', [], [], $version);
            $theme->asset()->add('fonts-css', 'assets/css/fonts.css');
            $theme->asset()->add('home-css', 'assets/css/home.css', [], [], $version);
            $theme->asset()->add('about-us-css', 'assets/css/about-us.css', [], [], $version);
            $theme->asset()->add('our-team-css', 'assets/css/our-team.css', [], [], $version);

            $theme->asset()->container('footer')->add('lib-js', 'assets/js/lib.js', [], [], $version);
            $theme->asset()->container('footer')->add('home-js', 'assets/js/home.js', [], [], $version);
            $theme->asset()->container('footer')->add('about-us-js', 'assets/js/about-us.js', [], [], $version);
            $theme->asset()->container('footer')->add('countdown-js', 'assets/js/count-down.js', [], [], $version);

            if (function_exists('shortcode')) {
                $theme->composer(['page', 'post'], function (\Platform\Shortcode\View\View $view) {
                    $view->withShortcodes();
                });
            }
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => [

            'default' => function ($theme)
            {
                // $theme->asset()->usePath()->add('ipad', 'css/layouts/ipad.css');
            }
        ]
    ]
];
