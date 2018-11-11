<?php

namespace Bytesoft\Table\Providers;

use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Bytesoft\Table\Facades\TableBuilderFacade;
use Bytesoft\Table\TableBuilder;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class TableServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    public function register()
    {
        $this->app->bind('table-builder', function (Container $container) {
            return new TableBuilder($container);
        });

        $loader = AliasLoader::getInstance();
        $loader->alias('TableBuilder', TableBuilderFacade::class);
    }

    /**
     * Bootstrap the application events.
     * @author Bytesoft
     */
    public function boot()
    {
        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('core/table')
            ->loadAndPublishConfigurations(['general'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes()
            ->publishAssetsFolder()
            ->publishPublicFolder();
    }
}
