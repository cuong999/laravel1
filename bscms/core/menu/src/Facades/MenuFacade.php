<?php

namespace Bytesoft\Menu\Facades;

use Bytesoft\Menu\Menu;
use Illuminate\Support\Facades\Facade;

class MenuFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     * @author Bytesoft
     */
    protected static function getFacadeAccessor()
    {
        return Menu::class;
    }
}
