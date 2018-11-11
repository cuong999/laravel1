<?php

namespace Bytesoft\Widget\Misc;

use Exception;

class InvalidWidgetClassException extends Exception
{
    /**
     * Exception message.
     *
     * @var string
     */
    protected $message = 'Widget class must extend Bytesoft\Widget\AbstractWidget class';
}
