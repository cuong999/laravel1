<?php

namespace Bytesoft\Slug\Providers;

use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Bytesoft\Slug\Models\Slug;
use Bytesoft\Slug\Repositories\Caches\SlugCacheDecorator;
use Bytesoft\Slug\Repositories\Eloquent\SlugRepository;
use Bytesoft\Slug\Repositories\Interfaces\SlugInterface;
use Bytesoft\Support\Services\Cache\Cache;
use Illuminate\Support\ServiceProvider;

class SlugServiceProvider extends ServiceProvider
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
            $this->app->singleton(SlugInterface::class, function () {
                return new SlugCacheDecorator(new SlugRepository(new Slug()), new Cache($this->app['cache'], SlugRepository::class));
            });
        } else {
            $this->app->singleton(SlugInterface::class, function () {
                return new SlugRepository(new Slug());
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
            ->setNamespace('core/slug')
            ->loadAndPublishConfigurations(['general'])
            ->loadAndPublishViews()
            ->loadRoutes()
            ->loadAndPublishTranslations()
            ->loadMigrations();

        $this->app->register(FormServiceProvider::class);
        $this->app->register(HookServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
        $this->app->register(CommandServiceProvider::class);
    }
}
