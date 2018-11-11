<?php

namespace Bytesoft\Note\Facades;

use Bytesoft\Note\Note;
use Illuminate\Support\Facades\Facade;

class NoteFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     * @author Bytesoft
     */
    protected static function getFacadeAccessor()
    {
        return Note::class;
    }
}
