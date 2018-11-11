<?php

namespace Bytesoft\CustomField;

use Bytesoft\Base\Interfaces\PluginInterface;
use Schema;

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
        Schema::dropIfExists('custom_fields');
        Schema::dropIfExists('field_items');
        Schema::dropIfExists('field_groups');
    }
}
