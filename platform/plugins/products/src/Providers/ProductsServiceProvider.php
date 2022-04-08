<?php

namespace Platform\Products\Providers;

use Platform\Products\Models\Products;
use Illuminate\Support\ServiceProvider;
use Platform\Products\Repositories\Caches\ProductsCacheDecorator;
use Platform\Products\Repositories\Eloquent\ProductsRepository;
use Platform\Products\Repositories\Interfaces\ProductsInterface;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class ProductsServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(ProductsInterface::class, function () {
            return new ProductsCacheDecorator(new ProductsRepository(new Products));
        });

        $this->setNamespace('plugins/products')->loadHelpers();
    }

    public function boot()
    {
        $this
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-products',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/products::products.name',
                'icon'        => 'far fa-play-circle',
                'url'         => route('products.index'),
                'permissions' => ['products.index'],
            ]);
        });
    }
}