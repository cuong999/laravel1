<?php

use Bytesoft\Menu\Repositories\Interfaces\MenuInterface;

if (!function_exists('get_all_menus')) {
    /**
     * @return mixed
     * @author Bytesoft
     */
    function get_all_menus()
    {
        return app(MenuInterface::class)->all();
    }
}
