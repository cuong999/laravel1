<?php

namespace Bytesoft\Base\Providers;

use Bytesoft\Base\Events\BeforeEditContentEvent;
use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\SendMailEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;
use Bytesoft\Base\Listeners\BeforeEditContentListener;
use Bytesoft\Base\Listeners\CreatedContentListener;
use Bytesoft\Base\Listeners\DeletedContentListener;
use Bytesoft\Base\Listeners\SendMailListener;
use Bytesoft\Base\Listeners\UpdatedContentListener;
use Event;
use File;
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
        SendMailEvent::class => [
            SendMailListener::class,
        ],
        CreatedContentEvent::class => [
            CreatedContentListener::class,
        ],
        UpdatedContentEvent::class => [
            UpdatedContentListener::class,
        ],
        DeletedContentEvent::class => [
            DeletedContentListener::class,
        ],
        BeforeEditContentEvent::class => [
            BeforeEditContentListener::class,
        ],
    ];

    /** Boot the service provider.
     * @return void
     * @author Bytesoft
     */
    public function boot()
    {
        parent::boot();

        Event::listen(['cache:cleared'], function () {
            File::delete(storage_path('cache_keys.json'));
            File::delete(storage_path('settings.json'));
        });
    }
}
