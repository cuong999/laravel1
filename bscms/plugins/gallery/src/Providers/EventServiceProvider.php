<?php

namespace Bytesoft\Gallery\Providers;

use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\RenderingSiteMapEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;
use Bytesoft\Gallery\Listeners\CreatedContentListener;
use Bytesoft\Gallery\Listeners\DeletedContentListener;
use Bytesoft\Gallery\Listeners\RenderingSiteMapListener;
use Bytesoft\Gallery\Listeners\UpdatedContentListener;
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
        UpdatedContentEvent::class => [
            UpdatedContentListener::class,
        ],
        CreatedContentEvent::class => [
            CreatedContentListener::class,
        ],
        DeletedContentEvent::class => [
            DeletedContentListener::class,
        ],
    ];
}
