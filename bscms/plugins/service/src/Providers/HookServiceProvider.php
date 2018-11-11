<?php

namespace Bytesoft\Service\Providers;

use Assets;
use Bytesoft\Base\Events\SessionStarted;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\SeoHelper\SeoOpenGraph;
use Eloquent;
use Event;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Menu;
use Bytesoft\Service\Repositories\Interfaces\ServiceInterface;
use Auth;
use SeoHelper;
use Theme;

class HookServiceProvider extends ServiceProvider
{
    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * Boot the service provider.
     *
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     * @throws \Throwable
     */
    public function boot()
    {
//        if (defined('MENU_ACTION_SIDEBAR_OPTIONS')) {
//            add_action(MENU_ACTION_SIDEBAR_OPTIONS, [$this, 'registerMenuOptions'], 2);
//        }
        //add_filter(DASHBOARD_FILTER_ADMIN_LIST, [$this, 'registerDashboardWidgets'], 21, 2);
        add_filter(BASE_FILTER_PUBLIC_SINGLE_DATA, [$this, 'handleSingleView'], 2, 1);

        Event::listen(SessionStarted::class, function () {
            admin_bar()->registerLink('Service', route('service.create'), 'add-new');
        });
    }

    /**
     * Register sidebar options in menu
     * @throws \Throwable
     */
//    public function registerMenuOptions()
//    {
//        if (Auth::user()->hasPermission('service.list')) {
//            $place = Menu::generateSelect([
//                'model' => $this->app->make(ServiceInterface::class)->getModel(),
//                'screen' => SERVICE_MODULE_SCREEN_NAME,
//                'theme' => false,
//                'options' => [
//                    'class' => 'list-item',
//                ],
//            ]);
//            echo view('plugins.service::place.partials.menu-options', compact('place'));
//        }
//    }

    /**
     * @param array $widgets
     * @param Collection $widget_settings
     * @return array
     * @throws \Throwable
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
//    public function registerDashboardWidgets($widgets, $widget_settings)
//    {
//        if (!Auth::user()->hasPermission('posts.list')) {
//            return $widgets;
//        }
//        Assets::addJavascriptDirectly(['/vendor/core/plugins/blog/js/blog.js']);
//
//        $widget = $widget_settings->where('name', 'widget_posts_recent')->first();
//        $widget_setting = $widget ? $widget->settings->first() : null;
//
//        if (!$widget) {
//            $widget = $this->app->make(DashboardWidgetInterface::class)->firstOrCreate(['name' => 'widget_posts_recent']);
//        }
//
//        $widget->title = trans('plugins.blog::posts.widget_posts_recent');
//        $widget->icon = 'fas fa-edit';
//        $widget->color = '#f3c200';
//
//        $data = [
//            'id' => $widget->id,
//            'view' => view('plugins.blog::posts.widgets.base', compact('widget', 'widget_setting'))->render(),
//        ];
//
//        if (empty($widget_setting) || array_key_exists($widget_setting->order, $widgets)) {
//            $widgets[] = $data;
//        } else {
//            $widgets[$widget_setting->order] = $data;
//        }
//        return $widgets;
//    }

    /**
     * @param Eloquent $slug
     * @return array|Eloquent
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handleSingleView($slug)
    {
        if ($slug instanceof Eloquent) {
            $data = [];
            switch ($slug->reference) {
                case SERVICE_MODULE_SCREEN_NAME:
                    $services = $this->app->make(ServiceInterface::class)->getFirstBy(['id' => $slug->reference_id, 'status' => 1]);
                    if (!empty($services)) {
                        Helper::handleViewCount($services, 'viewed_service');

                        SeoHelper::setTitle($services->name)->setDescription($services->description);

                        $meta = new SeoOpenGraph();
                        if ($services->image) {
                            $meta->setImage(url($services->image));
                        }
                        $meta->setDescription($services->description);
                        $meta->setUrl(route('public.single', $slug->key));
                        $meta->setTitle($services->name);
                        $meta->setType('article');

                        SeoHelper::setSeoOpenGraph($meta);

                        //admin_bar()->registerLink(trans('plugins.jobs::jobs.edit_this_jobs'), route('jobs.edit', $job->id));

                        Theme::breadcrumb()->add(__('Home'), route('public.index'))->add($services->name, route('public.single', $slug->key));

                        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, JOBS_MODULE_SCREEN_NAME, $services);

                        $data = [
                            'view' => 'service',
                            'default_view' => 'plugins.service::themes.service',
                            'data' => compact('services'),
                            'slug' => $services->slug,
                        ];
                    }
                    break;
            }
            if (!empty($data)) {
                return $data;
            }
        }

        return $slug;
    }

    /**
     * @param \stdClass $shortcode
     * @return \Response
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \Throwable
     */
    public function renderService($shortcode)
    {
        $query = $this->app->make(ServiceInterface::class)
            ->getModel()
            ->select('services.*')
            ->where(['services.status' => 1]);

        $service = $this->app->make(ServiceInterface::class)->applyBeforeExecuteQuery($query, SERVICE_MODULE_SCREEN_NAME)->paginate($shortcode->paginate ?? 12);

        $view = 'plugins.service::themes.service';
        $theme_view = 'themes.' . setting('theme') . '::views.service';
        if (view()->exists($theme_view)) {
            $view = $theme_view;
        }
        return view($view, compact('service'))->render();
    }
}
