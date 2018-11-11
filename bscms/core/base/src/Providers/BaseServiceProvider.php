<?php

namespace Bytesoft\Base\Providers;

use Bytesoft\Base\Charts\Supports\ChartBuilder;
use Bytesoft\Base\Events\SessionStarted;
use Bytesoft\Base\Exceptions\Handler;
use Bytesoft\Base\Http\Middleware\AdminBarMiddleware;
use Bytesoft\Base\Http\Middleware\DisableInDemoModeMiddleware;
use Bytesoft\Base\Http\Middleware\HttpsProtocolMiddleware;
use Bytesoft\Base\Http\Middleware\LocaleMiddleware;
use Bytesoft\Base\Http\Middleware\StartSessionMiddleware;
use Bytesoft\Base\Models\MetaBox as MetaBoxModel;
use Bytesoft\Base\Repositories\Caches\MetaBoxCacheDecorator;
use Bytesoft\Base\Repositories\Eloquent\MetaBoxRepository;
use Bytesoft\Base\Repositories\Interfaces\MetaBoxInterface;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Bytesoft\Installer\Providers\InstallerServiceProvider;
use Bytesoft\Setting\Providers\SettingServiceProvider;
use Bytesoft\Setting\Supports\SettingStore;
use Bytesoft\Support\Services\Cache\Cache;
use Event;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use MetaBox;
use Schema;

class BaseServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * Register any application services.
     *
     * @return void
     * @author Bytesoft
     */
    public function register()
    {
        if (!config('app.key')) {
            config(['app.key' => 'base64:jPDTWLGPka60Lg927hn8Qcxt9ZiuAiXT3XZAf8mwWu4=']);
        }
        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('core/base')
            ->loadAndPublishConfigurations(['general']);

        Helper::autoload(__DIR__ . '/../../helpers');

        $this->app->register(InstallerServiceProvider::class);
        $this->app->register(SettingServiceProvider::class);

        $config = $this->app->make('config');
        $setting = $this->app->make(SettingStore::class);

        $config->set([
            'app.timezone' => $setting->get('time_zone', $config->get('app.timezone')),
            'jsvalidation.view' => 'jsvalidation::bootstrap4',
            'ziggy.blacklist' => ['debugbar.*'],
            'session.cookie' => 'bytesoft_session',
            'filesystems.default' => $setting->get('media_driver', $config->get('filesystems.default')),
            'filesystems.disks.s3.key' => $setting
                ->get('media_aws_access_key_id', $config->get('filesystems.disks.s3.key')),
            'filesystems.disks.s3.secret' => $setting
                ->get('media_aws_secret_key', $config->get('filesystems.disks.s3.secret')),
            'filesystems.disks.s3.region' => $setting
                ->get('media_aws_default_region', $config->get('filesystems.disks.s3.region')),
            'filesystems.disks.s3.bucket' => $setting
                ->get('media_aws_bucket', $config->get('filesystems.disks.s3.bucket')),
            'filesystems.disks.s3.url' => $setting
                ->get('media_aws_url', $config->get('filesystems.disks.s3.url')),
            'app.debug_blacklist' => [
                '_ENV' => [
                    'APP_KEY',
                    'ADMIN_DIR',
                    'DB_DATABASE',
                    'DB_USERNAME',
                    'DB_PASSWORD',
                    'REDIS_PASSWORD',
                    'MAIL_PASSWORD',
                    'PUSHER_APP_KEY',
                    'PUSHER_APP_SECRET',
                ],
                '_SERVER' => [
                    'APP_KEY',
                    'ADMIN_DIR',
                    'DB_DATABASE',
                    'DB_USERNAME',
                    'DB_PASSWORD',
                    'REDIS_PASSWORD',
                    'MAIL_PASSWORD',
                    'PUSHER_APP_KEY',
                    'PUSHER_APP_SECRET',
                ],
                '_POST' => [
                    'password',
                ],
            ],
            'datatables-buttons.pdf_generator' => 'excel',
        ]);

        $this->app->singleton(ExceptionHandler::class, Handler::class);

        /**
         * @var Router $router
         */
        $router = $this->app['router'];

        $router->pushMiddlewareToGroup('web', LocaleMiddleware::class);
        $router->pushMiddlewareToGroup('web', HttpsProtocolMiddleware::class);
        $router->pushMiddlewareToGroup('web', AdminBarMiddleware::class);
        $router->pushMiddlewareToGroup('web', StartSessionMiddleware::class);
        $router->aliasMiddleware('preventDemo', DisableInDemoModeMiddleware::class);

        $this->app->bind('chart-builder', function (Container $container) {
            return new ChartBuilder($container);
        });

        if ($setting->get('enable_cache', false)) {
            $this->app->singleton(MetaBoxInterface::class, function () {
                return new MetaBoxCacheDecorator(
                    new MetaBoxRepository(new MetaBoxModel()),
                    new Cache($this->app['cache'], MetaBoxRepository::class)
                );
            });
        } else {
            $this->app->singleton(MetaBoxInterface::class, function () {
                return new MetaBoxRepository(new MetaBoxModel());
            });
        }

        $this->app->register(PluginServiceProvider::class);
    }

    /**
     * Boot the service provider.
     * @return void
     * @author Bytesoft
     */
    public function boot()
    {
        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('core/base')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadMigrations()
            ->publishAssetsFolder()
            ->publishPublicFolder();

        Schema::defaultStringLength(191);

        $this->app->booted(function () {
            do_action('init');
            add_action(BASE_ACTION_META_BOXES, [MetaBox::class, 'doMetaBoxes'], 8, 3);

            $this->app->make('config')->set([
                'app.locale' => env('APP_LOCALE', $this->app->make('config')->get('app.locale')),
            ]);
        });

        Event::listen(SessionStarted::class, function () {
            $this->registerDefaultMenus();
        });
    }

    /**
     * Add default dashboard menu for core
     * @author Bytesoft
     */
    public function registerDefaultMenus()
    {
        dashboard_menu()
            ->registerItem([
                'id' => 'cms-core-dashboard',
                'priority' => 0,
                'parent_id' => null,
                'name' => trans('core.base::layouts.dashboard'),
                'icon' => 'fa fa-home',
                'url' => route('dashboard.index'),
                'permissions' => ['dashboard.index'],
            ])
            ->registerItem([
                'id' => 'cms-core-appearance',
                'priority' => 996,
                'parent_id' => null,
                'name' => trans('core.base::layouts.appearance'),
                'icon' => 'fa fa-paint-brush',
                'url' => '#',
                'permissions' => [],
            ])
            ->registerItem([
                'id' => 'cms-core-plugins',
                'priority' => 997,
                'parent_id' => null,
                'name' => trans('core.base::layouts.plugins'),
                'icon' => 'fa fa-plug',
                'url' => route('plugins.list'),
                'permissions' => ['plugins.list'],
            ])
            ->registerItem([
                'id' => 'cms-core-platform-administration',
                'priority' => 999,
                'parent_id' => null,
                'name' => trans('core.base::layouts.platform_admin'),
                'icon' => 'fa fa-user-shield',
                'url' => null,
                'permissions' => ['users.list'],
            ])
            ->registerItem([
                'id' => 'cms-core-system-information',
                'priority' => 5,
                'parent_id' => 'cms-core-platform-administration',
                'name' => trans('core.base::system.info.title'),
                'icon' => null,
                'url' => route('system.info'),
                'permissions' => ['superuser'],
            ])
            ->registerItem([
                'id' => 'cms-core-system-cache',
                'priority' => 6,
                'parent_id' => 'cms-core-platform-administration',
                'name' => trans('core.base::cache.cache_management'),
                'icon' => null,
                'url' => route('system.cache'),
                'permissions' => ['superuser'],
            ]);
    }
}
