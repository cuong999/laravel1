<?php

namespace Bytesoft\Analytics\Facades;

use Bytesoft\Analytics\Analytics;
use Illuminate\Support\Facades\Facade;

/**
 * @see \Bytesoft\Analytics\Analytics
 */
class AnalyticsFacade extends Facade
{
    /**
     * @return string
     * @modified Bytesoft
     */
    protected static function getFacadeAccessor()
    {
        return Analytics::class;
    }
}
