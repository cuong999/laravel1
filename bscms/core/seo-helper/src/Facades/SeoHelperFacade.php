<?php

namespace Bytesoft\SeoHelper\Facades;

use Bytesoft\SeoHelper\SeoHelper;
use Illuminate\Support\Facades\Facade;

/**
 * Class SeoHelperFacade
 * @package Bytesoft\SEO\Facade
 * @author Bytesoft
 * @since 02/12/2015 14:08 PM
 */
class SeoHelperFacade extends Facade
{

    /**
     * @return string
     * @author Bytesoft
     */
    protected static function getFacadeAccessor()
    {
        return SeoHelper::class;
    }
}
