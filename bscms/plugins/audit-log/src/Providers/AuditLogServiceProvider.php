<?php

namespace Bytesoft\AuditLog\Providers;

use Bytesoft\AuditLog\Facades\AuditLogFacade;
use Bytesoft\AuditLog\Models\AuditHistory;
use Bytesoft\AuditLog\Repositories\Caches\AuditLogCacheDecorator;
use Bytesoft\AuditLog\Repositories\Eloquent\AuditLogRepository;
use Bytesoft\AuditLog\Repositories\Interfaces\AuditLogInterface;
use Bytesoft\Base\Events\SessionStarted;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Bytesoft\Support\Services\Cache\Cache;
use Event;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

/**
 * Class AuditLogServiceProvider
 * @package Bytesoft\AuditLog
 * @author Bytesoft
 * @since 02/07/2016 09:05 AM
 */
class AuditLogServiceProvider extends ServiceProvider
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
            $this->app->singleton(AuditLogInterface::class, function () {
                return new AuditLogCacheDecorator(new AuditLogRepository(new AuditHistory()), new Cache($this->app['cache'], AuditLogRepository::class));
            });
        } else {
            $this->app->singleton(AuditLogInterface::class, function () {
                return new AuditLogRepository(new AuditHistory());
            });
        }

        AliasLoader::getInstance()->alias('AuditLog', AuditLogFacade::class);

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    /**
     * Boot the service provider.
     * @author Bytesoft
     */
    public function boot()
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->register(CommandServiceProvider::class);

        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('plugins/audit-log')
            ->loadRoutes()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->publishPublicFolder()
            ->publishAssetsFolder();

        $this->app->register(HookServiceProvider::class);

        Event::listen(SessionStarted::class, function () {
            dashboard_menu()
                ->registerItem([
                    'id' => 'cms-plugin-audit-log',
                    'priority' => 8,
                    'parent_id' => 'cms-core-platform-administration',
                    'name' => trans('plugins.audit-log::history.name'),
                    'icon' => null,
                    'url' => route('audit-log.list'),
                    'permissions' => ['audit-log.list'],
                ]);
        });
    }
}
