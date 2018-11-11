<?php

namespace Bytesoft\MaintenanceMode;

use Schema;
use Bytesoft\Base\Interfaces\PluginInterface;

class Plugin implements PluginInterface
{

    /**
     * @author Bytesoft
     */
    public static function activate()
    {
    }

    /**
     * @author Bytesoft
     */
    public static function deactivate()
    {
    }

    /**
     * @author Bytesoft
     */
    public static function remove()
    {
        Schema::dropIfExists('maintenance_modes');
    }
}