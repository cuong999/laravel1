<?php

namespace Bytesoft\ACL\Providers;

use Bytesoft\ACL\Events\RoleAssignmentEvent;
use Bytesoft\ACL\Events\RoleUpdateEvent;
use Bytesoft\ACL\Listeners\LoginListener;
use Bytesoft\ACL\Listeners\RoleAssignmentListener;
use Bytesoft\ACL\Listeners\RoleUpdateListener;
use Illuminate\Auth\Events\Login;
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
        RoleUpdateEvent::class => [
            RoleUpdateListener::class,
        ],
        RoleAssignmentEvent::class => [
            RoleAssignmentListener::class,
        ],
        Login::class => [
            LoginListener::class,
        ],
    ];
}
