<?php

namespace Bytesoft\Base\Facades;

use Bytesoft\Base\MetaBox;
use Illuminate\Support\Facades\Facade;

/**
 * Class MetaBoxFacade
 * @package Bytesoft\Base
 */
class MetaBoxFacade extends Facade
{

    /**
     * @return string
     * @author Bytesoft
     * @since 2.2
     */
    protected static function getFacadeAccessor()
    {
        return MetaBox::class;
    }
}
