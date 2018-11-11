<?php

namespace Bytesoft\ACL\Providers;

use Bytesoft\ACL\Commands\RebuildPermissionsCommand;
use Bytesoft\ACL\Commands\SendUserBirthdayEmailCommand;
use Bytesoft\ACL\Commands\UserCreateCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * @author Bytesoft
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                UserCreateCommand::class,
                SendUserBirthdayEmailCommand::class,
            ]);

            $this->app->booted(function () {
                $this->app->make(Schedule::class)->command(SendUserBirthdayEmailCommand::class)->daily();
            });
        }

        $this->commands([
            RebuildPermissionsCommand::class,
        ]);
    }
}
