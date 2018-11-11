<?php

namespace Bytesoft\Table\Facades;

use Illuminate\Support\Facades\Facade;

class TableBuilderFacade extends Facade
{
    /**
     * @return string
     * @author Bytesoft
     */
    protected static function getFacadeAccessor()
    {
        return 'table-builder';
    }
}
