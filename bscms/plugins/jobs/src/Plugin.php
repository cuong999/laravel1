<?php

namespace Bytesoft\Jobs;

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
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    public static function deactivate()
    {
    }

    /**
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    public static function remove()
    {
        Schema::dropIfExists('jobs');
    }
}