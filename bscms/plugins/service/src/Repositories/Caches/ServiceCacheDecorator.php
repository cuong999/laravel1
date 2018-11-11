<?php

namespace Bytesoft\Service\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;
use Bytesoft\Service\Repositories\Interfaces\ServiceInterface;

class ServiceCacheDecorator extends CacheAbstractDecorator implements ServiceInterface
{
    /**
     * @var ServiceInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * ServiceCacheDecorator constructor.
     * @param ServiceInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(ServiceInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    /**
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    function getService($limit = 3)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    function getDataSiteMap()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

}
