<?php

namespace Bytesoft\Menu\Providers;

use Bytesoft\Base\Events\SessionStarted;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Bytesoft\Menu\Facades\MenuFacade;
use Bytesoft\Menu\Models\Menu as MenuModel;
use Bytesoft\Menu\Models\MenuNode;
use Bytesoft\Menu\Repositories\Caches\MenuCacheDecorator;
use Bytesoft\Menu\Repositories\Caches\MenuNodeCacheDecorator;
use Bytesoft\Menu\Repositories\Eloquent\MenuNodeRepository;
use Bytesoft\Menu\Repositories\Eloquent\MenuRepository;
use Bytesoft\Menu\Repositories\Interfaces\MenuInterface;
use Bytesoft\Menu\Repositories\Interfaces\MenuNodeInterface;
use Bytesoft\Support\Services\Cache\Cache;
use Event;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * Register the service provider.
     *
     * @return void
     * @author Bytesoft
     */
    public function register()
    {
        if (setting('enable_cache', false)) {
            $this->app->singleton(MenuInterface::class, function () {
                return new MenuCacheDecorator(new MenuRepository(new MenuModel()), new Cache($this->app['cache'], MenuRepository::class));
            });

            $this->app->singleton(MenuNodeInterface::class, function () {
                return new MenuNodeCacheDecorator(new MenuNodeRepository(new MenuNode()), new Cache($this->app['cache'], MenuNodeRepository::class));
            });
        } else {
            $this->app->singleton(MenuInterface::class, function () {
                return new MenuRepository(new MenuModel());
            });

            $this->app->singleton(MenuNodeInterface::class, function () {
                return new MenuNodeRepository(new MenuNode());
            });
        }

        AliasLoader::getInstance()->alias('Menu', MenuFacade::class);

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    /**
     * Boot the service provider.
     * @author Bytesoft
     */
    public function boot()
    {
        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('core/menu')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadRoutes()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadMigrations()
            ->publishAssetsFolder()
            ->publishPublicFolder();

        Event::listen(SessionStarted::class, function () {
            dashboard_menu()
                ->registerItem([
                    'id' => 'cms-core-menu',
                    'priority' => 2,
                    'parent_id' => 'cms-core-appearance',
                    'name' => trans('core.base::layouts.menu'),
                    'icon' => null,
                    'url' => route('menus.list'),
                    'permissions' => ['menus.list'],
                ]);

            admin_bar()->registerLink('Menu', route('menus.list'), 'appearance');
        });
    }
}
