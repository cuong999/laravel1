<?php

namespace Bytesoft\Assets\Facades;

use Bytesoft\Assets\Assets;
use Illuminate\Support\Facades\Facade;

/**
 * Class AssetsFacade
 * @package Bytesoft\Assets\Facade
 * @author Bytesoft
 * @since 22/07/2015 11:25 PM
 */
class AssetsFacade extends Facade
{

    /**
     * @return string
     * @author Bytesoft
     */
    protected static function getFacadeAccessor()
    {
        return Assets::class;
    }
}
