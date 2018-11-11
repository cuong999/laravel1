<?php

namespace Bytesoft\Base\Facades;

use Bytesoft\Base\Supports\MailVariable;
use Illuminate\Support\Facades\Facade;

class MailVariableFacade extends Facade
{

    /**
     * @return string
     * @author Bytesoft
     * @since 3.2
     */
    protected static function getFacadeAccessor()
    {
        return MailVariable::class;
    }
}
