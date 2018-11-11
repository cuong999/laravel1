<?php

namespace Bytesoft\Service\Providers;

use Bytesoft\Service\Models\Service;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Bytesoft\Service\Repositories\Caches\ServiceCacheDecorator;
use Bytesoft\Service\Repositories\Eloquent\ServiceRepository;
use Bytesoft\Service\Repositories\Interfaces\ServiceInterface;
use Bytesoft\Support\Services\Cache\Cache;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Events\SessionStarted;
use Event;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Language;
use SeoHelper;
use Bytesoft\Shortcode\View\View;

class ServiceServiceProvider extends BaseServiceProvider
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
            $this->app->singleton(ServiceInterface::class, function () {
                return new ServiceCacheDecorator(new ServiceRepository(new Service()), new Cache($this->app['cache'], ServiceRepository::class));
            });
        } else {
            $this->app->singleton(ServiceInterface::class, function () {
                return new ServiceRepository(new Service());
            });
        }

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    /**
     * @author Bytesoft
     */
    public function boot()
    {
        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('plugins/service')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes();

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(HookServiceProvider::class);
        $this->app->register(EventServiceProvider::class);

        Event::listen(SessionStarted::class, function () {
            dashboard_menu()->registerItem([
                'id' => 'cms-plugins-service',
                'priority' => 5,
                'parent_id' => null,
                'name' => trans('plugins.service::service.name'),
                'icon' => 'fa fa-list',
                'url' => route('service.list'),
                'permissions' => ['service.list'],
            ]);
        });

        if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            Language::registerModule([SERVICE_MODULE_SCREEN_NAME]);
        }

        $this->app->booted(function () {
            config(['core.slug.general.supported' => array_merge(config('core.slug.general.supported'), [SERVICE_MODULE_SCREEN_NAME])]);

            SeoHelper::registerModule([SERVICE_MODULE_SCREEN_NAME]);
        });

        view()->composer(['core.service::themes.service'], function (View $view) {
            $view->withShortcodes();
        });
    }
}
