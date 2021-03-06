<?php

namespace Bytesoft\MaintenanceMode\Providers;

use Illuminate\Support\ServiceProvider;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Events\SessionStarted;
use Event;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;

class MaintenanceModeServiceProvider extends ServiceProvider
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
        Helper::autoload(__DIR__ . '/../../helpers');
    }

    /**
     * @author Bytesoft
     */
    public function boot()
    {
        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('plugins/maintenance-mode')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes()
            ->publishPublicFolder()
            ->publishAssetsFolder();

        Event::listen(SessionStarted::class, function () {
            dashboard_menu()->registerItem([
                'id' => 'cms-core-system-maintenance-mode',
                'priority' => 700,
                'parent_id' => 'cms-core-platform-administration',
                'name' => trans('plugins.maintenance-mode::maintenance-mode.maintenance_mode'),
                'icon' => null,
                'url' => route('system.maintenance.index'),
                'permissions' => ['superuser'],
            ]);
        });
    }
}
