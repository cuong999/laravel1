<?php

namespace Bytesoft\AuditLog\Providers;

use Bytesoft\AuditLog\Events\AuditHandlerEvent;
use Bytesoft\AuditLog\Listeners\AuditHandlerListener;
use Bytesoft\AuditLog\Listeners\CreatedContentListener;
use Bytesoft\AuditLog\Listeners\DeletedContentListener;
use Bytesoft\AuditLog\Listeners\LoginListener;
use Bytesoft\AuditLog\Listeners\UpdatedContentListener;
use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        AuditHandlerEvent::class => [
            AuditHandlerListener::class,
        ],
        Login::class => [
            LoginListener::class,
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
