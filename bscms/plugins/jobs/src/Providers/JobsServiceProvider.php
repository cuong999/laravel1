<?php

namespace Bytesoft\Jobs\Providers;

use Bytesoft\Jobs\Models\Jobs;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Bytesoft\Jobs\Repositories\Caches\JobsCacheDecorator;
use Bytesoft\Jobs\Repositories\Eloquent\JobsRepository;
use Bytesoft\Jobs\Repositories\Interfaces\JobsInterface;
use Bytesoft\Support\Services\Cache\Cache;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Events\SessionStarted;
use Event;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Language;
use SeoHelper;
use Bytesoft\Shortcode\View\View;

class JobsServiceProvider extends BaseServiceProvider
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
            $this->app->singleton(JobsInterface::class, function () {
                return new JobsCacheDecorator(new JobsRepository(new Jobs()), new Cache($this->app['cache'], JobsRepository::class));
            });
        } else {
            $this->app->singleton(JobsInterface::class, function () {
                return new JobsRepository(new Jobs());
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
            ->setNamespace('plugins/jobs')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadMigrations()
            ->publishPublicFolder()
            ->publishAssetsFolder();

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(HookServiceProvider::class);
        $this->app->register(EventServiceProvider::class);

        Event::listen(SessionStarted::class, function () {
            dashboard_menu()->registerItem([
                'id' => 'cms-plugins-jobs',
                'priority' => 5,
                'parent_id' => null,
                'name' => trans('plugins.jobs::jobs.name'),
                'icon' => 'fa fa-list',
            ])
                ->registerItem([
                    'id' => 'cms-plugins-jobs-list',
                    'priority' => 1,
                    'parent_id' => 'cms-plugins-jobs',
                    'name' => 'List Jobs',
                    'icon' => null,
                    'url' => route('jobs.list'),
                    'permissions' => ['jobs.list'],
                ]);
        });

        if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            Language::registerModule([JOBS_MODULE_SCREEN_NAME]);
        }

        $this->app->booted(function () {
            config(['core.slug.general.supported' => array_merge(config('core.slug.general.supported'), [JOBS_MODULE_SCREEN_NAME])]);

            SeoHelper::registerModule([JOBS_MODULE_SCREEN_NAME]);
        });

        view()->composer(['core.jobs::themes.job'], function (View $view) {
            $view->withShortcodes();
        });
    }
}
