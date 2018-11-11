<?php

namespace Bytesoft\Product\Providers;

use Bytesoft\Product\Models\Product;
use Bytesoft\Product\Models\ProductGroup;
use Illuminate\Support\ServiceProvider;
use Bytesoft\Product\Repositories\Caches\ProductCacheDecorator;
use Bytesoft\Product\Repositories\Eloquent\ProductRepository;
use Bytesoft\Product\Repositories\Interfaces\ProductInterface;
use Bytesoft\Product\Repositories\Caches\ProductGroupCacheDecorator;
use Bytesoft\Product\Repositories\Eloquent\ProductGroupRepository;
use Bytesoft\Product\Repositories\Interfaces\ProductGroupInterface;
use Bytesoft\Support\Services\Cache\Cache;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Events\SessionStarted;
use Event;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Language;
use SeoHelper;


class ProductServiceProvider extends ServiceProvider
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
            $this->app->singleton(ProductInterface::class, function () {
                return new ProductCacheDecorator(new ProductRepository(new Product()), new Cache($this->app['cache'], ProductRepository::class));
            });

            $this->app->singleton(ProductGroupInterface::class, function () {
                return new ProductGroupCacheDecorator(new ProductGroupRepository(new ProductGroup()), new Cache($this->app['cache'], ProductGroupRepository::class));
            });

        } else {

            $this->app->singleton(ProductInterface::class, function () {
                return new ProductRepository(new Product());
            });

            $this->app->singleton(ProductGroupInterface::class, function () {
                return new ProductGroupRepository(new ProductGroup());
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
            ->setNamespace('plugins/product')
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
                'id' => 'cms-plugins-product',
                'priority' => 5,
                'parent_id' => null,
                'name' => trans('plugins.product::product.name'),
                'icon' => 'fa fa-list',
                'url' => route('product.list'),
                'permissions' => ['product.list'],
            ])
                ->registerItem([
                    'id' => 'cms-plugins-product-list',
                    'priority' => 5,
                    'parent_id' => 'cms-plugins-product',
                    'name' => trans('plugins.product::product.name'),
                    'url' => route('product.list'),
                    'permissions' => ['product.list'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-product-group',
                    'priority' => 5,
                    'parent_id' => 'cms-plugins-product',
                    'name' => trans('plugins.product::product.group'),
                    'url' => route('product.groups.list'),
                    'permissions' => ['product.groups.list'],
                ]);

        });

        if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            Language::registerModule([PRODUCT_MODULE_SCREEN_NAME, PRODUCT_GROUP_MODULE_SCREEN_NAME]);
        }

        $this->app->booted(function () {
            config(['core.slug.general.supported' => array_merge(config('core.slug.general.supported'), [PRODUCT_MODULE_SCREEN_NAME, PRODUCT_GROUP_MODULE_SCREEN_NAME])]);

            SeoHelper::registerModule([PRODUCT_MODULE_SCREEN_NAME, PRODUCT_GROUP_MODULE_SCREEN_NAME]);
        });

        view()->composer(['core.product::themes.products', 'core.product::themes.product_groups'], function (View $view) {
            $view->withShortcodes();
        });
    }
}
