<?php

namespace Bytesoft\Backup\Providers;

use Bytesoft\Base\Events\SessionStarted;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Event;
use Illuminate\Support\ServiceProvider;

class BackupServiceProvider extends ServiceProvider
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
            ->setNamespace('plugins/backup')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadRoutes()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->publishAssetsFolder()
            ->publishPublicFolder();

        $this->app->register(HookServiceProvider::class);

        Event::listen(SessionStarted::class, function () {
            dashboard_menu()->registerItem([
                'id' => 'cms-plugin-backup',
                'priority' => 8,
                'parent_id' => 'cms-core-platform-administration',
                'name' => trans('plugins.backup::backup.menu_name'),
                'icon' => null,
                'url' => route('backups.list'),
                'permissions' => ['backups.list'],
            ]);
        });
    }
}
