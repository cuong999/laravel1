<?php

namespace Bytesoft\Dashboard\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface DashboardWidgetSettingInterface extends RepositoryInterface
{
    /**
     * @return mixed
     * @author Bytesoft
     * @since 2.1
     */
    public function getListWidget();
}
