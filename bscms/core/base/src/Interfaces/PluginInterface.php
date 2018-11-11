<?php

namespace Bytesoft\Base\Interfaces;

interface PluginInterface
{

    /**
     * @author Bytesoft
     */
    public static function activate();

    /**
     * @author Bytesoft
     */
    public static function deactivate();

    /**
     * @author Bytesoft
     */
    public static function remove();
}
