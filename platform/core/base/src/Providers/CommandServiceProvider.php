<?php

namespace Platform\Base\Providers;

use Platform\Base\Commands\ClearLogCommand;
use Platform\Base\Commands\InstallCommand;
use Platform\Base\Commands\PublishAssetsCommand;
use Illuminate\Support\ServiceProvider;
use Platform\Base\Commands\RouteGeneratorCommand;

class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->commands([
            ClearLogCommand::class,
            InstallCommand::class,
            PublishAssetsCommand::class,
            RouteGeneratorCommand::class,
        ]);
    }
}
