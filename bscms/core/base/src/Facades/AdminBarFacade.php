<?php

namespace Bytesoft\Base\Facades;

use Bytesoft\Base\Supports\AdminBar;
use Illuminate\Support\Facades\Facade;

class AdminBarFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return AdminBar::class;
    }
}
