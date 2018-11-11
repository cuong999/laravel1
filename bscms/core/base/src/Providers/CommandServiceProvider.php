<?php

namespace Bytesoft\Base\Providers;

use Bytesoft\Base\Commands\ClearLogCommand;
use Bytesoft\Base\Commands\Git\InstallHooks;
use Bytesoft\Base\Commands\Git\PreCommitHook;
use Bytesoft\Base\Commands\InstallCommand;
use Bytesoft\Base\Commands\PluginActivateCommand;
use Bytesoft\Base\Commands\PluginCreateCommand;
use Bytesoft\Base\Commands\PluginDeactivateCommand;
use Bytesoft\Base\Commands\PluginListCommand;
use Bytesoft\Base\Commands\PluginRemoveCommand;
use Bytesoft\Base\Commands\TruncateTablesCommand;
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
                InstallCommand::class,
                InstallHooks::class,
                PreCommitHook::class,
            ]);
        }

        $this->commands([
            PluginCreateCommand::class,
            PluginActivateCommand::class,
            PluginDeactivateCommand::class,
            PluginRemoveCommand::class,
            PluginListCommand::class,
            ClearLogCommand::class,
            TruncateTablesCommand::class,
        ]);
    }
}
