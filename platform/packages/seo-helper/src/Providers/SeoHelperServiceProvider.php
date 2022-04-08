<?php

namespace Platform\SeoHelper\Providers;

use Platform\Base\Traits\LoadAndPublishDataTrait;
use Platform\SeoHelper\Contracts\SeoHelperContract;
use Platform\SeoHelper\Contracts\SeoMetaContract;
use Platform\SeoHelper\Contracts\SeoOpenGraphContract;
use Platform\SeoHelper\Contracts\SeoTwitterContract;
use Platform\SeoHelper\SeoHelper;
use Platform\SeoHelper\SeoMeta;
use Platform\SeoHelper\SeoOpenGraph;
use Platform\SeoHelper\SeoTwitter;
use Illuminate\Support\ServiceProvider;

/**
 * @since 02/12/2015 14:09 PM
 */
class SeoHelperServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(SeoMetaContract::class, SeoMeta::class);
        $this->app->bind(SeoHelperContract::class, SeoHelper::class);
        $this->app->bind(SeoOpenGraphContract::class, SeoOpenGraph::class);
        $this->app->bind(SeoTwitterContract::class, SeoTwitter::class);

        $this->setNamespace('packages/seo-helper')
            ->loadHelpers();
    }

    public function boot()
    {
        $this
            ->loadAndPublishConfigurations(['general'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->publishAssets();

        $this->app->register(EventServiceProvider::class);

        $this->app->booted(function () {
            $this->app->register(HookServiceProvider::class);
        });
    }
}
