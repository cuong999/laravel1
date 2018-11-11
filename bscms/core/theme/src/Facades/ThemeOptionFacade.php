<?php

namespace Bytesoft\Theme\Facades;

use Bytesoft\Theme\ThemeOption;
use Illuminate\Support\Facades\Facade;

class ThemeOptionFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     * @author Bytesoft
     */
    protected static function getFacadeAccessor()
    {
        return ThemeOption::class;
    }
}
