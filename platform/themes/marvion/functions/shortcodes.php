<?php

use Platform\Theme\Supports\ThemeSupport;

app()->booted(function () {
    ThemeSupport::registerGoogleMapsShortcode();
    ThemeSupport::registerYoutubeShortcode();

    if (is_plugin_active('simple-slider')) {
        add_filter(SIMPLE_SLIDER_VIEW_TEMPLATE, function () {
            return Theme::getThemeNamespace() . '::partials.short-codes.sliders';
        }, 120);
    }
    if (is_plugin_active('team')) {
        add_shortcode('our-management-team', __('Our Management Team'), __('Our Management Team'), function ($shortCode) {
            return Theme::partial('short-codes.teams.our-management', compact('shortCode'));
        });
        shortcode()->setAdminConfig('our-management-team', function ($attributes) {
            return Theme::partial('short-codes.teams.our-management-admin-config', compact('attributes'));
        });
        add_shortcode('board-of-advisors', __('Board Of Advisors'), __('Board Of Advisors'), function ($shortCode) {
            return Theme::partial('short-codes.teams.board-of-advisors', compact('shortCode'));
        });
        shortcode()->setAdminConfig('board-of-advisors', function ($attributes) {
            return Theme::partial('short-codes.teams.board-of-advisors-admin-config', compact('attributes'));
        });
    }

    add_shortcode('about-us', __('About us'), __('About us'), function ($shortCode) {
        return Theme::partial('short-codes.about-us', compact('shortCode'));
    });

    shortcode()->setAdminConfig('about-us', function ($attributes) {
        return Theme::partial('short-codes.about-us-admin-config', compact('attributes'));
    });

    add_shortcode('featured-product', __('Featured product'), __('Featured product'), function ($shortCode) {
        return Theme::partial('short-codes.featured-product', compact('shortCode'));
    });

    shortcode()->setAdminConfig('featured-product', function ($attributes) {
        return Theme::partial('short-codes.featured-product-admin-config', compact('attributes'));
    });

    if (is_plugin_active('testimonial')) {
        add_shortcode('testimonials', __('Testimonials'), __('Testimonials'), function ($shortCode) {
            return Theme::partial('short-codes.testimonials', compact('shortCode'));
        });
    }

    if (is_plugin_active('core-product')) {
        add_shortcode('core-product', __('Core product'), __('Core product'), function ($shortCode) {
            return Theme::partial('short-codes.core-product', compact('shortCode'));
        });
        shortcode()->setAdminConfig('core-product', function ($attributes) {
            return Theme::partial('short-codes.core-product-admin-config', compact('attributes'));
        });

        add_shortcode('featured-in-sites', __('Featured in sites'), __('Featured in sites'), function ($shortCode) {
            return Theme::partial('short-codes.featured-in-sites', compact('shortCode'));
        });
    }

    add_shortcode('featured-video', __('Featured video'), __('Featured video'), function ($shortCode) {
        return Theme::partial('short-codes.featured-video', compact('shortCode'));
    });
    shortcode()->setAdminConfig('featured-video', function ($attributes) {
        return Theme::partial('short-codes.featured-video-admin-config', compact('attributes'));
    });

    add_shortcode('past-productions', __('Showcase Of Past Productions'), __('Showcase Of Past Productions'), function ($shortCode) {
        return Theme::partial('short-codes.past-productions', compact('shortCode'));
    });
    shortcode()->setAdminConfig('past-productions', function ($attributes) {
        return Theme::partial('short-codes.past-productions-admin-config', compact('attributes'));
    });

    add_shortcode('our-partners', __('Our partners'), __('Our partners'), function ($shortCode) {
        return Theme::partial('short-codes.our-partners', compact('shortCode'));
    });
    shortcode()->setAdminConfig('our-partners', function ($attributes) {
        return Theme::partial('short-codes.our-partners-admin-config', compact('attributes'));
    });

    add_shortcode('tab-block-content', __('Tab block content'), __('Tab block content'), function ($shortCode) {
        return Theme::partial('short-codes.tab-block-content', compact('shortCode'));
    });
    shortcode()->setAdminConfig('tab-block-content', function ($attributes) {
        return Theme::partial('short-codes.tab-block-content-admin-config', compact('attributes'));
    });
});
