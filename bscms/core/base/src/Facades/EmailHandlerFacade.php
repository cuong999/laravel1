<?php

namespace Bytesoft\Base\Facades;

use Bytesoft\Base\Supports\EmailHandler;
use Illuminate\Support\Facades\Facade;

/**
 * Class EmailHandlerFacade
 * @package Bytesoft\Base\Facades
 */
class EmailHandlerFacade extends Facade
{

    /**
     * @return string
     * @author Bytesoft
     * @since 2.2
     */
    protected static function getFacadeAccessor()
    {
        return EmailHandler::class;
    }
}
