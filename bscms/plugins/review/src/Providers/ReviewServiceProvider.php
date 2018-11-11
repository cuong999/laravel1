<?php

namespace Bytesoft\Review\Providers;

use Bytesoft\Review\Models\Review;
use Illuminate\Support\ServiceProvider;
use Bytesoft\Review\Repositories\Caches\ReviewCacheDecorator;
use Bytesoft\Review\Repositories\Eloquent\ReviewRepository;
use Bytesoft\Review\Repositories\Interfaces\ReviewInterface;
use Bytesoft\Support\Services\Cache\Cache;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Events\SessionStarted;
use Event;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;

class ReviewServiceProvider extends ServiceProvider
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
            $this->app->singleton(ReviewInterface::class, function () {
                return new ReviewCacheDecorator(new ReviewRepository(new Review()), new Cache($this->app['cache'], ReviewRepository::class));
            });
        } else {
            $this->app->singleton(ReviewInterface::class, function () {
                return new ReviewRepository(new Review());
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
            ->setNamespace('plugins/review')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes();

        Event::listen(SessionStarted::class, function () {
            dashboard_menu()->registerItem([
                'id' => 'cms-plugins-review',
                'priority' => 5,
                'parent_id' => null,
                'name' => trans('plugins.review::review.name'),
                'icon' => 'fa fa-list',
                'url' => route('review.list'),
                'permissions' => ['review.list'],
            ]);
        });
    }
}
