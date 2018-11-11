<?php

namespace Bytesoft\Service\Providers;

use Bytesoft\Base\Events\RenderingJsonFeedEvent;
use Bytesoft\Base\Events\RenderingSiteMapEvent;
use Bytesoft\Service\Listeners\RenderingSiteMapListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as BaseServiceProvider;

class EventServiceProvider extends BaseServiceProvider
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
            RenderingSiteMapListener::class,
        ],
        RenderingJsonFeedEvent::class => [
            RenderingJsonFeedListener::class,
        ],
    ];
}
