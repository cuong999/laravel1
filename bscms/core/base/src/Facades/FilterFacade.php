<?php

namespace Bytesoft\Base\Facades;

use Bytesoft\Base\Supports\Filter;
use Illuminate\Support\Facades\Facade;

/**
 * Class FilterFacade
 * @package Bytesoft\Base
 */
class FilterFacade extends Facade
{

    /**
     * @return string
     * @author Bytesoft
     * @since 2.1
     */
    protected static function getFacadeAccessor()
    {
        return Filter::class;
    }
}
