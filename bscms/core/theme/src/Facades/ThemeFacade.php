<?php

namespace Bytesoft\Theme\Facades;

use Bytesoft\Theme\Theme;
use Illuminate\Support\Facades\Facade;

class ThemeFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     * @author Bytesoft
     */
    protected static function getFacadeAccessor()
    {
        return Theme::class;
    }
}
