<?php

namespace Bytesoft\Base\Facades;

use Bytesoft\Base\Supports\JsonFeedManager;
use Illuminate\Support\Facades\Facade;

class JsonFeedManagerFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return JsonFeedManager::class;
    }
}
