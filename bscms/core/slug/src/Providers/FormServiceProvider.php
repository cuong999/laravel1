<?php

namespace Bytesoft\Slug\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{

    /**
     * Boot the service provider.
     * @return void
     * @author Bytesoft
     */
    public function boot()
    {
        $this->app->booted(function () {
            Form::component('permalink', 'core.slug::permalink', [
                'name',
                'value' => null,
                'id' => null,
                'prefix' => '',
                'ending_url' => config('core.base.general.public_single_ending_url'),
                'attributes' => [],
            ]);
        });
    }
}