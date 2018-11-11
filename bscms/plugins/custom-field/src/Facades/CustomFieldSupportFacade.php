<?php

namespace Bytesoft\CustomField\Facades;

use Illuminate\Support\Facades\Facade;
use Bytesoft\CustomField\Support\CustomFieldSupport;

/**
 * Class CustomFieldSupportFacade
 * @package Bytesoft\CustomField\Facades
 */
class CustomFieldSupportFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return CustomFieldSupport::class;
    }
}
