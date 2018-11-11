<?php

namespace Bytesoft\Page\Providers;

use Bytesoft\Base\Events\SessionStarted;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Bytesoft\Page\Models\Page;
use Bytesoft\Page\Repositories\Caches\PageCacheDecorator;
use Bytesoft\Page\Repositories\Eloquent\PageRepository;
use Bytesoft\Page\Repositories\Interfaces\PageInterface;
use Bytesoft\Shortcode\View\View;
use Bytesoft\Support\Services\Cache\Cache;
use Event;
use Illuminate\Support\ServiceProvider;

/**
 * Class PageServiceProvider
 * @package Bytesoft\Page
 * @author Bytesoft
 * @since 02/07/2016 09:50 AM
 */
class PageServiceProvider extends ServiceProvider
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
            $this->app->singleton(PageInterface::class, function () {
                return new PageCacheDecorator(new PageRepository(new Page()), new Cache($this->app['cache'], PageRepository::class));
            });
        } else {
            $this->app->singleton(PageInterface::class, function () {
                return new PageRepository(new Page());
            });
        }

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    /**
     * Boot the service provider.
     * @author Bytesoft
     */
    public function boot()
    {
        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('core/page')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadRoutes()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadMigrations();

        $this->app->register(HookServiceProvider::class);
        $this->app->register(EventServiceProvider::class);

        Event::listen(SessionStarted::class, function () {
            dashboard_menu()->registerItem([
                'id' => 'cms-core-page',
                'priority' => 2,
                'parent_id' => null,
                'name' => trans('core.page::pages.menu_name'),
                'icon' => 'fa fa-book',
                'url' => route('pages.list'),
                'permissions' => ['pages.list'],
            ]);

            admin_bar()->registerLink('Page', route('pages.list'), 'add-new');
        });

        view()->composer(['core.page::themes.page'], function(View $view) {
            $view->withShortcodes();
        });
    }
}
