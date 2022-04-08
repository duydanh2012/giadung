<?php

namespace Platform\Base\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Routing\Router;
use Illuminate\Support\Arr;

class RouteGeneratorCommand extends Command
{
    protected $signature = 'cms:route:generate {path?} {--url=/}';

    protected $description = 'Generate js file for including in build process';

    protected $baseUrl;
    protected $baseProtocol;
    protected $baseDomain;
    protected $basePort;
    protected $router;
    protected $routes;

    public function __construct(Router $router, Filesystem $files)
    {
        parent::__construct();

        $this->router = $router;
        $this->files = $files;
        $this->routes = $this->nameKeyedRoutes();
    }

    public function handle()
    {
        $path = $this->argument('path');
        if (!$path) {
            $path = platform_path('/core/base/resources/assets/js/ziggy/ziggy.js');
        }
        $generatedRoutes = $this->generate();

        $this->makeDirectory($path);

        $this->files->put($path, $generatedRoutes);

        $this->files->copy($path , public_path('vendor/core/core/base/js/ziggy.js'));
        $this->files->copy($path , platform_path('core/base/public/js/ziggy.js'));

        $this->info('File generated!');
    }

    public function generate()
    {
        $this->prepareDomain();

        $json = $this->getRoutePayload()->toJson();

        $defaultParameters = method_exists(app('url'), 'getDefaultParameters') ? json_encode(app('url')->getDefaultParameters()) : '[]';

        return <<<EOT

var Ziggy = {
    namedRoutes: $json,
    baseUrl: window.location.origin,
    baseProtocol: window.location.protocol,
    baseDomain: window.location.host,
    basePort: {$this->basePort},
    defaultParameters: $defaultParameters
};

if (typeof window.Ziggy !== 'undefined') {
    for (var name in window.Ziggy.namedRoutes) {
        Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
    }
}

window.Ziggy = Ziggy;

EOT;
    }

    private function prepareDomain()
    {
        $url = url($this->option('url'));
        $parsedUrl = parse_url($url);

        $this->baseUrl = $url . '/';
        $this->baseProtocol = array_key_exists('scheme', $parsedUrl) ? $parsedUrl['scheme'] : 'http';
        $this->baseDomain = array_key_exists('host', $parsedUrl) ? $parsedUrl['host'] : '';
        $this->basePort = array_key_exists('port', $parsedUrl) ? $parsedUrl['port'] : 'false';
    }

    public function getRoutePayload()
    {
        return $this->routes;
    }

    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }
        return $path;
    }

    protected function nameKeyedRoutes()
    {
        return collect($this->router->getRoutes()->getRoutesByName())
            ->reject(function ($route) {
                return !Arr::has($route->action, 'ziggy');
            })
            ->map(function ($route) {
                return collect($route)->only(['uri', 'methods'])
                    ->put('domain', $route->domain());
            });
    }
}
