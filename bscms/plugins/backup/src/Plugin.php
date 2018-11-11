<?php

namespace Bytesoft\Backup;

use Bytesoft\Base\Interfaces\PluginInterface;
use File;

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
        $backup_path = storage_path('app/backup');
        if (File::isDirectory($backup_path)) {
            File::deleteDirectory($backup_path);
        }
    }
}
