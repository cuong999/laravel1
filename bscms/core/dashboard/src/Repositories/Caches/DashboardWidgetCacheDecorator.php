<?php

namespace Bytesoft\Dashboard\Repositories\Caches;

use Bytesoft\Dashboard\Repositories\Interfaces\DashboardWidgetInterface;
use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;

class DashboardWidgetCacheDecorator extends CacheAbstractDecorator implements DashboardWidgetInterface
{
    /**
     * @var DashboardWidgetInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * WidgetCacheDecorator constructor.
     * @param DashboardWidgetInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(DashboardWidgetInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
