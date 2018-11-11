<?php

namespace Bytesoft\Dashboard\Repositories\Caches;

use Bytesoft\Dashboard\Repositories\Interfaces\DashboardWidgetSettingInterface;
use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;

class DashboardWidgetSettingCacheDecorator extends CacheAbstractDecorator implements DashboardWidgetSettingInterface
{
    /**
     * @var DashboardWidgetSettingInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * WidgetCacheDecorator constructor.
     * @param DashboardWidgetSettingInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(DashboardWidgetSettingInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    /**
     * @return mixed
     * @author Bytesoft
     * @since 2.1
     */
    public function getListWidget()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
