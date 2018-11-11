<?php

namespace Bytesoft\Base\Supports;

use Breadcrumbs;

class AdminBreadcrumb
{
    /**
     * @return string
     * @author Bytesoft
     * @throws \Exception
     */
    public function render()
    {
        return Breadcrumbs::render('main', page_title()->getTitle(false));
    }
}
