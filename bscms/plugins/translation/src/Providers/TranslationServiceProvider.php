<?php

namespace Bytesoft\Translation\Providers;

use Bytesoft\Base\Events\SessionStarted;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Bytesoft\Translation\Console\CleanCommand;
use Bytesoft\Translation\Console\ExportCommand;
use Bytesoft\Translation\Console\FindCommand;
use Bytesoft\Translation\Console\ImportCommand;
use Bytesoft\Translation\Console\ResetCommand;
use Bytesoft\Translation\Manager;
use Event;
use Illuminate\Support\ServiceProvider;

class TranslationServiceProvider extends ServiceProvider
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
        $this->app->bind('translation-manager', Manager::class);

        $this->commands([
            ImportCommand::class,
            FindCommand::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                ResetCommand::class,
                ExportCommand::class,
                CleanCommand::class
            ]);
        }
    }

    /**
     * @author Bytesoft
     */
    public function boot()
    {
        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('plugins/translation')
            ->loadAndPublishConfigurations(['general', 'permissions'])
            ->loadMigrations()
            ->loadRoutes()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->publishAssetsFolder()
            ->publishPublicFolder();

        Event::listen(SessionStarted::class, function () {
            dashboard_menu()->registerItem([
                'id' => 'cms-plugin-translation',
                'priority' => 6,
                'parent_id' => 'cms-core-platform-administration',
                'name' => trans('plugins.translation::translation.menu_name'),
                'icon' => null,
                'url' => route('translations.list'),
                'permissions' => ['translations.list'],
            ]);
        });
    }
}
