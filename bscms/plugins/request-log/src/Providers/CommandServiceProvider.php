<?php

namespace Bytesoft\RequestLog\Providers;

use Bytesoft\RequestLog\Commands\RequestLogClearCommand;
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
                RequestLogClearCommand::class,
            ]);
        }
    }
}
