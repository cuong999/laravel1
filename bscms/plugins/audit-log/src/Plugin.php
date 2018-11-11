<?php

namespace Bytesoft\AuditLog;

use Bytesoft\Base\Interfaces\PluginInterface;
use Bytesoft\Dashboard\Repositories\Interfaces\DashboardWidgetInterface;
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
        Schema::dropIfExists('audit_history');
        app(DashboardWidgetInterface::class)->deleteBy(['name' => 'widget_audit_logs']);
    }
}
