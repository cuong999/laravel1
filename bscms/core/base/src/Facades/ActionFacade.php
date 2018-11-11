<?php

namespace Bytesoft\Base\Facades;

use Bytesoft\Base\Supports\Action;
use Illuminate\Support\Facades\Facade;

/**
 * Class ActionFacade
 * @package Bytesoft\Base
 */
class ActionFacade extends Facade
{

    /**
     * @return string
     * @author Bytesoft
     * @since 2.1
     */
    protected static function getFacadeAccessor()
    {
        return Action::class;
    }
}
