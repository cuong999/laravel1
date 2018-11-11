<?php

namespace Bytesoft\Language\Facades;

use Bytesoft\Language\LanguageManager;
use Illuminate\Support\Facades\Facade;

class LanguageFacade extends Facade
{

    /**
     * @return string
     * @author Bytesoft
     */
    protected static function getFacadeAccessor()
    {
        return LanguageManager::class;
    }
}
