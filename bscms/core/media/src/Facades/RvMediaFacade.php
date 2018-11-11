<?php

namespace Bytesoft\Media\Facades;

use Bytesoft\Media\RvMedia;
use Illuminate\Support\Facades\Facade;

class RvMediaFacade extends Facade
{
    /**
     * @return string
     * @author Bytesoft
     */
    protected static function getFacadeAccessor()
    {
        return RvMedia::class;
    }
}
