<?php

namespace Bytesoft\Note\Providers;

use Bytesoft\Base\Traits\LoadAndPublishDataTrait;
use Bytesoft\Note\Facades\NoteFacade;
use Bytesoft\Support\Services\Cache\Cache;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\Note\Models\Note;
use Bytesoft\Note\Repositories\Caches\NoteCacheDecorator;
use Bytesoft\Note\Repositories\Eloquent\NoteRepository;
use Bytesoft\Note\Repositories\Interfaces\NoteInterface;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

/**
 * Class NoteServiceProvider
 * @package Bytesoft\Note
 * @author Bytesoft
 * @since 07/02/2016 09:50 AM
 */
class NoteServiceProvider extends ServiceProvider
{

    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * @author Bytesoft
     */
    public function register()
    {
        if (setting('enable_cache', false)) {
            $this->app->singleton(NoteInterface::class, function () {
                return new NoteCacheDecorator(new NoteRepository(new Note()), new Cache($this->app['cache'], NoteRepository::class));
            });
        } else {
            $this->app->singleton(NoteInterface::class, function () {
                return new NoteRepository(new Note());
            });
        }

        Helper::autoload(__DIR__ . '/../../helpers');

        AliasLoader::getInstance()->alias('Note', NoteFacade::class);
    }

    /**
     * Boot the service provider.
     * @author Bytesoft
     */
    public function boot()
    {
        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('plugins/note')
            ->loadAndPublishViews()
            ->loadAndPublishConfigurations(['general'])
            ->loadMigrations();

        $this->app->register(HookServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
    }
}
