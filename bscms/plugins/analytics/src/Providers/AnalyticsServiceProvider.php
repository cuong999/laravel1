<?php

namespace Bytesoft\Analytics\Providers;

use Bytesoft\Analytics\Analytics;
use Bytesoft\Analytics\AnalyticsClient;
use Bytesoft\Analytics\AnalyticsClientFactory;
use Bytesoft\Analytics\Facades\AnalyticsFacade;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Bytesoft\Analytics\Exceptions\InvalidConfiguration;

class AnalyticsServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * Register the service provider.
     * @author Freek Van der Herten
     * @modified Bytesoft
     */
    public function register()
    {
        Helper::autoload(__DIR__ . '/../../helpers');

        $this->app->bind(AnalyticsClient::class, function () {
            return AnalyticsClientFactory::createForConfig(config('plugins.analytics.general'));
        });

        $this->app->bind(Analytics::class, function () {
            if (empty(setting('analytics_view_id', config('plugins.analytics.general.view_id')))) {
                throw InvalidConfiguration::viewIdNotSpecified();
            }

            if (!setting('analytics_service_account_credentials')) {
                throw InvalidConfiguration::credentialsIsNotValid();
            }

            return new Analytics($this->app->make(AnalyticsClient::class), setting('analytics_view_id', config('plugins.analytics.general.view_id')));
        });

        AliasLoader::getInstance()->alias('Analytics', AnalyticsFacade::class);
    }

    /**
     * Bootstrap the application events.
     * @author Bytesoft
     */
    public function boot()
    {
        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('plugins/analytics')
            ->loadAndPublishConfigurations(['general', 'permissions'])
            ->loadRoutes()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->publishPublicFolder()
            ->publishAssetsFolder();

        $this->app->register(HookServiceProvider::class);
    }
}
