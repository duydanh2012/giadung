<?php

namespace Platform\Table\Providers;

use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Support\ServiceProvider;

class TableServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot()
    {
        $this->setNamespace('core/table')
            ->loadHelpers()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web'])
            ->publishAssets();
    }
}
