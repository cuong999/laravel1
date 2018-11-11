<?php

namespace Bytesoft\Blog\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Blog\Repositories\Interfaces\CategoryInterface;
use Bytesoft\Support\Services\Cache\CacheInterface;
use Illuminate\Support\Collection;

class CategoryCacheDecorator extends CacheAbstractDecorator implements CategoryInterface
{
    /**
     * @var CategoryInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * CategoryCacheDecorator constructor.
     * @param CategoryInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(CategoryInterface $repository, CacheInterface $cache)
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
    public function getFeaturedCategories($limit)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param array $condition
     * @return mixed
     * @author Bytesoft
     */
    public function getAllCategories(array $condition = [])
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
    public function getCategories(array $select, array $orderBy)
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
    public function getAllCategoriesWithChildren(array $condition = [], array $with = [], array $select = ['*'])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
