<?php

namespace Bytesoft\Svprocess\Providers;

use Bytesoft\Svprocess\Models\Svprocess;
use Illuminate\Support\ServiceProvider;
use Bytesoft\Svprocess\Repositories\Caches\SvprocessCacheDecorator;
use Bytesoft\Svprocess\Repositories\Eloquent\SvprocessRepository;
use Bytesoft\Svprocess\Repositories\Interfaces\SvprocessInterface;
use Bytesoft\Support\Services\Cache\Cache;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Events\SessionStarted;
use Event;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;

class SvprocessServiceProvider extends ServiceProvider
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
            $this->app->singleton(SvprocessInterface::class, function () {
                return new SvprocessCacheDecorator(new SvprocessRepository(new Svprocess()), new Cache($this->app['cache'], SvprocessRepository::class));
            });
        } else {
            $this->app->singleton(SvprocessInterface::class, function () {
                return new SvprocessRepository(new Svprocess());
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
            ->setNamespace('plugins/svprocess')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes();

        Event::listen(SessionStarted::class, function () {
            dashboard_menu()->registerItem([
                'id' => 'cms-plugins-svprocess',
                'priority' => 5,
                'parent_id' => null,
                'name' => trans('plugins.svprocess::svprocess.name'),
                'icon' => 'fa fa-list',
                'url' => route('svprocess.list'),
                'permissions' => ['svprocess.list'],
            ]);
        });
    }
}
