<?php

namespace Bytesoft\SeoHelper\Contracts\Entities;

use Bytesoft\SeoHelper\Contracts\RenderableContract;

interface AnalyticsContract extends RenderableContract
{
    /**
     * Set Google Analytics code.
     *
     * @param  string $code
     *
     * @return self
     * @author ARCANEDEV
     */
    public function setGoogle($code);
}
