<?php

namespace Bytesoft\Captcha\Facades;

use Bytesoft\Captcha\Captcha;
use Illuminate\Support\Facades\Facade;

class CaptchaFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     * @author Bytesoft
     */
    protected static function getFacadeAccessor()
    {
        return Captcha::class;
    }
}
