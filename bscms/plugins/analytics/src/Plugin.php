<?php

namespace Bytesoft\Analytics;

use Bytesoft\Base\Interfaces\PluginInterface;
use Bytesoft\Dashboard\Models\DashboardWidget;
use Bytesoft\Dashboard\Repositories\Interfaces\DashboardWidgetInterface;

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
     * @throws \Exception
     */
    public static function remove()
    {
        $widgets = app(DashboardWidgetInterface::class)
            ->getModel()
            ->whereIn('name', [
                'widget_analytics_general',
                'widget_analytics_page',
                'widget_analytics_browser',
                'widget_analytics_referrer',
            ])
            ->get();

        foreach ($widgets as $widget) {
            /**
             * @var DashboardWidget $widget
             */
            $widget->delete();
        }
    }
}
