<?php

namespace Bytesoft\Product\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;
use Bytesoft\Product\Repositories\Interfaces\ProductGroupInterface;

class ProductGroupCacheDecorator extends CacheAbstractDecorator implements ProductGroupInterface
{
    /**
     * @var ProductGroupInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * ProductCacheDecorator constructor.
     * @param ProductInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(ProductInterface $repository, CacheInterface $cache)
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
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getFeaturedProductGroups($limit)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param array $condition
     * @return mixed
     * @author Bytesoft
     */
    public function getAllProductGroups(array $condition = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getCategoryById($id)
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }

    /**
     * @param array $select
     * @param array $orderBy
     * @return Collection
     */
    public function getProductGroups(array $select, array $orderBy)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function getAllRelatedChildrenIds($id)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param array $condition
     * @return mixed
     * @author Bytesoft
     */
    public function getAllProductGroupsWithChildren(array $condition = [], array $with = [], array $select = ['*'])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

}
