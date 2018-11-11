<?php

namespace Bytesoft\Slider;

use Artisan;
use Schema;
use Bytesoft\Base\Interfaces\PluginInterface;

class Plugin implements PluginInterface
{

    /**
     * @author Sang Nguyen
     */
    public static function activate()
    {
        Artisan::call('migrate', [
            '--force' => true,
            '--path' => 'plugins/slider/database/migrations',
        ]);
    }

    /**
     * @author Sang Nguyen
     */
    public static function deactivate()
    {
    }

    /**
     * @author Sang Nguyen
     */
    public static function remove()
    {
        Schema::dropIfExists('sliders');
    }
}