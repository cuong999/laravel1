<?php

namespace Bytesoft\Jobs\Providers;

use Bytesoft\Base\Events\RenderingJsonFeedEvent;
use Bytesoft\Base\Events\RenderingSiteMapEvent;
use Bytesoft\Jobs\Listeners\RenderingSiteMapListener as JobsSitemap;
use Bytesoft\Jobs\Listeners\RenderingJsonFeedListener as JobsJson;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    protected $listen = [
        RenderingSiteMapEvent::class => [
            JobsSitemap::class,
        ],
        RenderingJsonFeedEvent::class => [
            JobsJson::class,
        ],
    ];
}
