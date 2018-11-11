<?php

namespace Bytesoft\Optimize\Providers;

use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Bytesoft\Optimize\Http\Middleware\CollapseWhitespace;
use Bytesoft\Optimize\Http\Middleware\ElideAttributes;
use Bytesoft\Optimize\Http\Middleware\InlineCss;
use Bytesoft\Optimize\Http\Middleware\InsertDNSPrefetch;
use Bytesoft\Optimize\Http\Middleware\RemoveComments;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class OptimizeServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * @author Bytesoft
     */
    public function boot()
    {
        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('core/optimize')
            ->loadAndPublishConfigurations(['general']);

        /**
         * @var Router $router
         */
        $router = $this->app['router'];

        $router->pushMiddlewareToGroup('web', ElideAttributes::class);
        $router->pushMiddlewareToGroup('web', InsertDNSPrefetch::class);
        if (!$this->app->isLocal() && !is_in_admin()) {
            $router->pushMiddlewareToGroup('web', CollapseWhitespace::class);
        }
        $router->pushMiddlewareToGroup('web', RemoveComments::class);
        $router->pushMiddlewareToGroup('web', InlineCss::class);
        //$router->pushMiddlewareToGroup('web', RemoveQuotes::class);
        //$router->pushMiddlewareToGroup('web', TrimUrls::class);
    }
}
