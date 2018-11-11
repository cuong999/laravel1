<?php

namespace Bytesoft\Theme\Providers;

use Bytesoft\Base\Supports\Helper;
use Illuminate\Support\ServiceProvider;

class ThemeManagementServiceProvider extends ServiceProvider
{
    /**
     * @author Bytesoft
     */
    public function boot()
    {
        $theme = setting('theme');
        if (check_database_connection() && !empty($theme)) {
            $this->app->make('translator')->addJsonPath(public_path('themes/' . $theme . '/lang'));

            Helper::autoload(public_path(config('core.theme.general.themeDir')) . '/' . $theme . '/functions');
        }
    }
}
