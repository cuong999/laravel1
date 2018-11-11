<?php

namespace Bytesoft\Installer\Providers;

use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Bytesoft\Installer\Http\Middleware\CheckIfInstalledMiddleware;
use Bytesoft\Installer\Http\Middleware\RedirectIfNotInstalledMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class InstallerServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var Application
     */
    protected $app;

    /**
     * Bootstrap the application events.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function boot(Router $router)
    {
        $router->middlewareGroup('install', [CheckIfInstalledMiddleware::class]);
        $router->pushMiddlewareToGroup('web', RedirectIfNotInstalledMiddleware::class);

        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('core.installer')
            ->loadAndPublishConfigurations('installer')
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes()
            ->publishAssetsFolder()
            ->publishPublicFolder('vendor/core/installer');

        Helper::autoload(__DIR__ . '/../../helpers');
    }
}
