<?php

namespace Bytesoft\Page\Providers;

use Bytesoft\Base\Events\RenderingJsonFeedEvent;
use Bytesoft\Base\Events\RenderingSiteMapEvent;
use Bytesoft\Page\Listeners\RenderingJsonFeedListener;
use Bytesoft\Page\Listeners\RenderingSiteMapListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     * @author Bytesoft
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
