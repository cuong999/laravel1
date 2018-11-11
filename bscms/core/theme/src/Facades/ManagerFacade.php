<?php

namespace Bytesoft\Theme\Facades;

use Bytesoft\Theme\Manager;
use Illuminate\Support\Facades\Facade;

/**
 * Class ManagerFacade
 * @package Bytesoft\Base
 */
class ManagerFacade extends Facade
{

    /**
     * @return string
     * @author Bytesoft
     * @since 2.1
     */
    protected static function getFacadeAccessor()
    {
        return Manager::class;
    }
}
