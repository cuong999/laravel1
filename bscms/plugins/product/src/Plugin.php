<?php

namespace Bytesoft\Product;

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
        Schema::dropIfExists('products');
    }
}