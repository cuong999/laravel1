<?php

namespace Bytesoft\Blog\Providers;

use Bytesoft\Base\Events\SessionStarted;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Bytesoft\Blog\Models\Post;
use Bytesoft\Blog\Repositories\Caches\PostCacheDecorator;
use Bytesoft\Blog\Repositories\Eloquent\PostRepository;
use Bytesoft\Blog\Repositories\Interfaces\PostInterface;
use Bytesoft\Shortcode\View\View;
use Bytesoft\Support\Services\Cache\Cache;
use Event;
use Illuminate\Support\ServiceProvider;
use Bytesoft\Blog\Models\Category;
use Bytesoft\Blog\Repositories\Caches\CategoryCacheDecorator;
use Bytesoft\Blog\Repositories\Eloquent\CategoryRepository;
use Bytesoft\Blog\Repositories\Interfaces\CategoryInterface;
use Bytesoft\Blog\Models\Tag;
use Bytesoft\Blog\Repositories\Caches\TagCacheDecorator;
use Bytesoft\Blog\Repositories\Eloquent\TagRepository;
use Bytesoft\Blog\Repositories\Interfaces\TagInterface;
use Language;
use SeoHelper;

/**
 * Class BlogServiceProvider
 * @package Bytesoft\Blog
 * @author Bytesoft
 * @since 02/07/2016 09:50 AM
 */
class BlogServiceProvider extends ServiceProvider
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
            $this->app->singleton(PostInterface::class, function () {
                return new PostCacheDecorator(new PostRepository(new Post()), new Cache($this->app['cache'], __CLASS__));
            });

            $this->app->singleton(CategoryInterface::class, function () {
                return new CategoryCacheDecorator(new CategoryRepository(new Category()), new Cache($this->app['cache'], __CLASS__));
            });

            $this->app->singleton(TagInterface::class, function () {
                return new TagCacheDecorator(new TagRepository(new Tag()), new Cache($this->app['cache'], __CLASS__));
            });
        } else {
            $this->app->singleton(PostInterface::class, function () {
                return new PostRepository(new Post());
            });

            $this->app->singleton(CategoryInterface::class, function () {
                return new CategoryRepository(new Category());
            });

            $this->app->singleton(TagInterface::class, function () {
                return new TagRepository(new Tag());
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
            ->setNamespace('plugins/blog')
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
                'id' => 'cms-plugins-blog',
                'priority' => 3,
                'parent_id' => null,
                'name' => trans('plugins.blog::base.menu_name'),
                'icon' => 'fa fa-edit',
                'url' => route('posts.list'),
                'permissions' => ['posts.list'],
            ])
                ->registerItem([
                    'id' => 'cms-plugins-blog-post',
                    'priority' => 1,
                    'parent_id' => 'cms-plugins-blog',
                    'name' => trans('plugins.blog::posts.menu_name'),
                    'icon' => null,
                    'url' => route('posts.list'),
                    'permissions' => ['posts.list'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-blog-categories',
                    'priority' => 2,
                    'parent_id' => 'cms-plugins-blog',
                    'name' => trans('plugins.blog::categories.menu_name'),
                    'icon' => null,
                    'url' => route('categories.list'),
                    'permissions' => ['categories.list'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-blog-tags',
                    'priority' => 3,
                    'parent_id' => 'cms-plugins-blog',
                    'name' => trans('plugins.blog::tags.menu_name'),
                    'icon' => null,
                    'url' => route('tags.list'),
                    'permissions' => ['tags.list'],
                ]);
        });

        if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            Language::registerModule([POST_MODULE_SCREEN_NAME, CATEGORY_MODULE_SCREEN_NAME, TAG_MODULE_SCREEN_NAME]);
        }

        $this->app->booted(function () {
            config(['core.slug.general.supported' => array_merge(config('core.slug.general.supported'), [POST_MODULE_SCREEN_NAME, CATEGORY_MODULE_SCREEN_NAME, TAG_MODULE_SCREEN_NAME])]);
            config(['core.slug.general.prefixes.' . TAG_MODULE_SCREEN_NAME => 'tag']);

            SeoHelper::registerModule([POST_MODULE_SCREEN_NAME, CATEGORY_MODULE_SCREEN_NAME, TAG_MODULE_SCREEN_NAME]);
        });

        view()->composer(['core.blog::themes.post', 'core.blog::themes.category', 'core.blog::themes.tag'], function(View $view) {
            $view->withShortcodes();
        });
    }
}
