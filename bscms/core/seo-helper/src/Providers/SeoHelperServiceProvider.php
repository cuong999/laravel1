<?php

namespace Bytesoft\SeoHelper\Providers;

use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Bytesoft\SeoHelper\Contracts\SeoHelperContract;
use Bytesoft\SeoHelper\Contracts\SeoMetaContract;
use Bytesoft\SeoHelper\Contracts\SeoOpenGraphContract;
use Bytesoft\SeoHelper\Contracts\SeoTwitterContract;
use Bytesoft\SeoHelper\Facades\SeoHelperFacade;
use Bytesoft\SeoHelper\SeoHelper;
use Bytesoft\SeoHelper\SeoMeta;
use Bytesoft\SeoHelper\SeoOpenGraph;
use Bytesoft\SeoHelper\SeoTwitter;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

/**
 * Class SEOServiceProvider
 * @package Bytesoft\SEO
 * @author Bytesoft
 * @since 02/12/2015 14:09 PM
 */
class SeoHelperServiceProvider extends ServiceProvider
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
        $this->app->bind(SeoMetaContract::class, SeoMeta::class);
        $this->app->bind(SeoHelperContract::class, SeoHelper::class);
        $this->app->bind(SeoOpenGraphContract::class, SeoOpenGraph::class);
        $this->app->bind(SeoTwitterContract::class, SeoTwitter::class);

        AliasLoader::getInstance()->alias('SeoHelper', SeoHelperFacade::class);

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    /**
     * Boot the service provider.
     * @author Bytesoft
     */
    public function boot()
    {
        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('core/seo-helper')
            ->loadAndPublishConfigurations(['general'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->publishAssetsFolder()
            ->publishPublicFolder();

        $this->app->register(HookServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
    }
}
