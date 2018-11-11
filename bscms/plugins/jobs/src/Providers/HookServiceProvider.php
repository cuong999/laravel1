<?php

namespace Bytesoft\Jobs\Providers;

use Assets;
use Bytesoft\Base\Events\SessionStarted;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\SeoHelper\SeoOpenGraph;
use Eloquent;
use Event;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Menu;
use Bytesoft\Jobs\Repositories\Interfaces\JobsInterface;
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
            admin_bar()->registerLink('Jobs', route('jobs.create'), 'add-new');
        });
    }

//    /**
//     * Register sidebar options in menu
//     * @throws \Throwable
//     */
//    public function registerMenuOptions()
//    {
//        if (Auth::user()->hasPermission('jobs.list')) {
//            $place = Menu::generateSelect([
//                'model' => $this->app->make(JobsInterface::class)->getModel(),
//                'screen' => JOBS_MODULE_SCREEN_NAME,
//                'theme' => false,
//                'options' => [
//                    'class' => 'list-item',
//                ],
//            ]);
//            echo view('plugins.jobs::place.partials.menu-options', compact('place'));
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
     * @website bytesoft.vn
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handleSingleView($slug)
    {
        if ($slug instanceof Eloquent) {
            $data = [];
            switch ($slug->reference) {
                case JOBS_MODULE_SCREEN_NAME:
                    $jobs = $this->app->make(JobsInterface::class)->getFirstBy(['id' => $slug->reference_id, 'status' => 1]);
                    if (!empty($jobs)) {
                        Helper::handleViewCount($jobs, 'viewed_jobs');

                        SeoHelper::setTitle($jobs->name)->setDescription($jobs->description);

                        $meta = new SeoOpenGraph();
                        if ($jobs->image) {
                            $meta->setImage(url($jobs->image));
                        }
                        $meta->setDescription($jobs->description);
                        $meta->setUrl(route('public.single', $slug->key));
                        $meta->setTitle($jobs->name);
                        $meta->setType('article');

                        SeoHelper::setSeoOpenGraph($meta);

                        //admin_bar()->registerLink(trans('plugins.jobs::jobs.edit_this_jobs'), route('jobs.edit', $job->id));

                        Theme::breadcrumb()->add(__('Home'), route('public.index'))->add($jobs->name, route('public.single', $slug->key));

                        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, JOBS_MODULE_SCREEN_NAME, $jobs);

                        $data = [
                            'view' => 'jobs',
                            'default_view' => 'plugins.jobs::themes.jobs',
                            'data' => compact('jobs'),
                            'slug' => $jobs->slug,
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
    public function renderJobs($shortcode)
    {
        $query = $this->app->make(JobsInterface::class)
            ->getModel()
            ->select('jobs.*')
            ->where(['jobs.status' => 1]);

        $jobs = $this->app->make(JobsInterface::class)->applyBeforeExecuteQuery($query, JOBS_MODULE_SCREEN_NAME)->paginate($shortcode->paginate ?? 12);

        $view = 'plugins.jobs::themes.jobs';
        $theme_view = 'themes.' . setting('theme') . '::views.jobs';
        if (view()->exists($theme_view)) {
            $view = $theme_view;
        }
        return view($view, compact('jobs'))->render();
    }
}
