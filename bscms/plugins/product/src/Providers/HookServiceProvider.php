<?php

namespace Bytesoft\Product\Providers;

use Assets;
use Bytesoft\Base\Events\SessionStarted;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\SeoHelper\SeoOpenGraph;
use Eloquent;
use Event;
use Illuminate\Support\ServiceProvider;
use Menu;
use Bytesoft\Product\Repositories\Interfaces\ProductInterface;
use Bytesoft\Product\Repositories\Interfaces\ProductGroupInterface;
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
     * @author Bytesoft
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
            admin_bar()->registerLink('Product', route('product.create'), 'add-new');
        });

    }

    /**
     * @param Eloquent $slug
     * @return array|Eloquent
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    public function handleSingleView($slug)
    {
        if ($slug instanceof Eloquent) {
            $data = [];
            switch ($slug->reference) {
                case PRODUCT_MODULE_SCREEN_NAME:
                    $product = $this->app->make(ProductInterface::class)->getFirstBy(['id' => $slug->reference_id, 'status' => 1]);
                    if (!empty($product)) {
                        Helper::handleViewCount($product, 'viewed_product');

                        SeoHelper::setTitle($product->name)->setDescription($product->description);

                        $meta = new SeoOpenGraph();
                        if ($product->image) {
                            $meta->setImage(url($product->image));
                        }
                        $meta->setDescription($product->description);
                        $meta->setUrl(route('public.single', $slug->key));
                        $meta->setTitle($product->name);
                        $meta->setType('article');

                        SeoHelper::setSeoOpenGraph($meta);

                        admin_bar()->registerLink(trans('plugins.product::product.edit_this_product'), route('product.edit', $product->id));

                        Theme::breadcrumb()->add(__('Home'), route('public.index'))->add($product->name, route('public.single', $slug->key));

                        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, PRODUCT_MODULE_SCREEN_NAME, $product);

                        $data = [
                            'view' => 'product',
                            'default_view' => 'plugins.product::themes.product',
                            'data' => compact('product'),
                            'slug' => $product->slug,
                        ];
                    }
                    break;
                case PRODUCT_GROUP_MODULE_SCREEN_NAME:
                    $product_group = $this->app->make(ProductGroupInterface::class)->getFirstBy(['id' => $slug->reference_id, 'status' => 1]);
                    if (!empty($product_group)) {
                        SeoHelper::setTitle($product_group->name)->setDescription($product_group->description);

                        $meta = new SeoOpenGraph();
                        if ($product_group->image) {
                            $meta->setImage(url($product_group->image));
                        }
                        $meta->setDescription($product_group->description);
                        $meta->setUrl(route('public.single', $slug->key));
                        $meta->setTitle($product_group->name);
                        $meta->setType('article');

                        SeoHelper::setSeoOpenGraph($meta);

                        admin_bar()->registerLink(trans('plugins.product::product_group.edit_this_group'), route('product.groups.edit', $product_group->id));

                        $allRelatedCategoryIds = array_unique(array_merge($this->app->make(ProductGroupInterface::class)->getAllRelatedChildrenIds($product_group->id), [$product_group->id]));

                        $products = $this->app->make(ProductInterface::class)->getByProductGroup($allRelatedCategoryIds, 12);

                        Theme::breadcrumb()->add(__('Home'), route('public.index'))->add($product_group->name, route('public.single', $slug->key));

                        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, PRODUCT_GROUP_MODULE_SCREEN_NAME, $product_group);

                        return [
                            'view' => 'product_group',
                            'default_view' => 'plugins.product::themes.product_group',
                            'data' => compact('product_group', 'products'),
                            'slug' => $product_group->slug,
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
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     * @throws \Throwable
     */
    public function renderProduct($shortcode)
    {
        $query = $this->app->make(ProductInterface::class)
            ->getModel()
            ->select('products.*')
            ->where(['products.status' => 1]);

        $products = $this->app->make(ProductInterface::class)->applyBeforeExecuteQuery($query, PRODUCT_MODULE_SCREEN_NAME)->paginate($shortcode->paginate ?? 12);

        $view = 'plugins.product::themes.templates.products';
        $theme_view = 'theme.' . setting('theme') . '::views.templates.products';
        if (view()->exists($theme_view)) {
            $view = $theme_view;
        }
        return view($view, compact('products'))->render();
    }
}
