<?php

namespace Bytesoft\Dashboard\Providers;

use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Bytesoft\Dashboard\Models\DashboardWidget;
use Bytesoft\Dashboard\Models\DashboardWidgetSetting;
use Bytesoft\Dashboard\Repositories\Caches\DashboardWidgetCacheDecorator;
use Bytesoft\Dashboard\Repositories\Caches\DashboardWidgetSettingCacheDecorator;
use Bytesoft\Dashboard\Repositories\Eloquent\DashboardWidgetRepository;
use Bytesoft\Dashboard\Repositories\Eloquent\DashboardWidgetSettingRepository;
use Bytesoft\Dashboard\Repositories\Interfaces\DashboardWidgetInterface;
use Bytesoft\Dashboard\Repositories\Interfaces\DashboardWidgetSettingInterface;
use Bytesoft\Support\Services\Cache\Cache;
use Illuminate\Support\ServiceProvider;

/**
 * Class DashboardServiceProvider
 * @package Bytesoft\Dashboard
 * @author Bytesoft
 * @since 02/07/2016 09:50 AM
 */
class DashboardServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * @author Bytesoft
     */
    public function register()
    {
        if (setting('enable_cache', false)) {
            $this->app->singleton(DashboardWidgetInterface::class, function () {
                return new DashboardWidgetCacheDecorator(new DashboardWidgetRepository(new DashboardWidget()), new Cache($this->app['cache'], DashboardWidgetRepository::class));
            });

            $this->app->singleton(DashboardWidgetSettingInterface::class, function () {
                return new DashboardWidgetSettingCacheDecorator(new DashboardWidgetSettingRepository(new DashboardWidgetSetting()), new Cache($this->app['cache'], DashboardWidgetSettingRepository::class));
            });
        } else {
            $this->app->singleton(DashboardWidgetInterface::class, function () {
                return new DashboardWidgetRepository(new DashboardWidget());
            });

            $this->app->singleton(DashboardWidgetSettingInterface::class, function () {
                return new DashboardWidgetSettingRepository(new DashboardWidgetSetting());
            });
        }

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    /**
     * Boot the service provider.
     * @author Bytesoft
     */
    public function boot()
    {
        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('core/dashboard')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadRoutes()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->publishAssetsFolder()
            ->publishPublicFolder()
            ->loadMigrations();
    }
}
