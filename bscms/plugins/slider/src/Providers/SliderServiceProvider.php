<?php

namespace Bytesoft\Slider\Providers;

use Bytesoft\Slider\Models\Slider;
use Illuminate\Support\ServiceProvider;
use Bytesoft\Slider\Repositories\Caches\SliderCacheDecorator;
use Bytesoft\Slider\Repositories\Eloquent\SliderRepository;
use Bytesoft\Slider\Repositories\Interfaces\SliderInterface;
use Bytesoft\Support\Services\Cache\Cache;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Events\SessionStarted;
use Event;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;

class SliderServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * @author Sang Nguyen
     */
    public function register()
    {
        if (setting('enable_cache', false)) {
            $this->app->singleton(SliderInterface::class, function () {
                return new SliderCacheDecorator(new SliderRepository(new Slider()), new Cache($this->app['cache'], SliderRepository::class));
            });
        } else {
            $this->app->singleton(SliderInterface::class, function () {
                return new SliderRepository(new Slider());
            });
        }

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    /**
     * @author Sang Nguyen
     */
    public function boot()
    {
        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('plugins/slider')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes();

        Event::listen(SessionStarted::class, function () {
            dashboard_menu()->registerItem([
                'id' => 'cms-plugins-slider',
                'priority' => 5,
                'parent_id' => null,
                'name' => 'Slider Seting',
                'icon' => 'fa fa-list',
                'url' => route('slider.list'),
                'permissions' => ['slider.list'],
            ]);
        });
    }
}
