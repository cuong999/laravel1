<?php

namespace Bytesoft\Widget\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface WidgetInterface extends RepositoryInterface
{
    /**
     * Get all theme widgets
     * @param string $theme
     * @return mixed
     * @author Bytesoft
     */
    public function getByTheme($theme);
}
