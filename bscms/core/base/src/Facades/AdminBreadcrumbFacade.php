<?php

namespace Bytesoft\Base\Facades;

use Bytesoft\Base\Supports\AdminBreadcrumb;
use Illuminate\Support\Facades\Facade;

/**
 * Class AdminBreadcrumbFacade
 * @package Bytesoft\Base
 */
class AdminBreadcrumbFacade extends Facade
{

    /**
     * @return string
     * @author Bytesoft
     * @since 2.1
     */
    protected static function getFacadeAccessor()
    {
        return AdminBreadcrumb::class;
    }
}
