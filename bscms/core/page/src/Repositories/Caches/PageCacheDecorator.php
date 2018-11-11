<?php

namespace Bytesoft\Page\Repositories\Caches;

use Bytesoft\Page\Repositories\Interfaces\PageInterface;
use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;

class PageCacheDecorator extends CacheAbstractDecorator implements PageInterface
{
    /**
     * @var PageInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * PageCacheDecorator constructor.
     * @param PageInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(PageInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function getDataSiteMap()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getFeaturedPages($limit)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param $array
     * @param array $select
     * @return mixed
     * @author Bytesoft
     */
    public function whereIn($array, $select = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param $query
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getSearch($query, $limit = 10)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param bool $active
     * @return mixed
     * @author Bytesoft
     */
    public function getAllPages($active = true)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
