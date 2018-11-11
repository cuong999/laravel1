<?php

namespace Bytesoft\Language\Providers;

use Bytesoft\Language\Commands\SyncOldDataCommand;
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
                SyncOldDataCommand::class,
            ]);
        }
    }
}
