<?php

namespace Bytesoft\Contacts\Providers;

use Bytesoft\Contacts\Models\Contacts;
use Illuminate\Support\ServiceProvider;
use Bytesoft\Contacts\Repositories\Caches\ContactsCacheDecorator;
use Bytesoft\Contacts\Repositories\Eloquent\ContactsRepository;
use Bytesoft\Contacts\Repositories\Interfaces\ContactsInterface;
use Bytesoft\Support\Services\Cache\Cache;
use Bytesoft\Base\Supports\Helper;
use Bytesoft\Base\Events\SessionStarted;
use Event;
use Bytesoft\Base\Traits\LoadAndPublishDataTrait;

class ContactsServiceProvider extends ServiceProvider
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
            $this->app->singleton(ContactsInterface::class, function () {
                return new ContactsCacheDecorator(new ContactsRepository(new Contacts()), new Cache($this->app['cache'], ContactsRepository::class));
            });
        } else {
            $this->app->singleton(ContactsInterface::class, function () {
                return new ContactsRepository(new Contacts());
            });
        }

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    /**
     * @author Bytesoft
     */
    public function boot()
    {
        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('plugins/contacts')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes();

        Event::listen(SessionStarted::class, function () {
            dashboard_menu()->registerItem([
                'id' => 'cms-plugins-contacts',
                'priority' => 5,
                'parent_id' => null,
                'name' => trans('plugins.contacts::contacts.name'),
                'icon' => 'fa fa-list',
                'url' => route('contacts.list'),
                'permissions' => ['contacts.list'],
            ]);
        });
    }
}
