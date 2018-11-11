<?php

namespace Bytesoft\RequestLog\Providers;

use Bytesoft\RequestLog\Events\RequestHandlerEvent;
use Bytesoft\RequestLog\Listeners\RequestHandlerListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        RequestHandlerEvent::class => [
            RequestHandlerListener::class,
        ],
    ];
}
