<?php

namespace Bytesoft\Product\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;
use Bytesoft\Product\Repositories\Interfaces\ProductInterface;

class ProductCacheDecorator extends CacheAbstractDecorator implements ProductInterface
{
    /**
     * @var ProductInterface
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

    public function getBySlug($slug, $status)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getFeatured($limit = 5)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param array $selected
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getListProductNonInList(array $selected = [], $limit = 12)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param int $user_id
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getByUserId($user_id, $limit = 6)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
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
     * @param int $tag
     * @param int $paginate
     * @return mixed
     * @author Bytesoft
     */
    public function getByTag($tag, $paginate = 12)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param string $slug
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getRelated($slug, $limit = 3)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param int $limit
     * @param int $category_id
     * @return mixed
     * @author Bytesoft
     */
    public function getRecentProducts($limit = 5, $category_id = 0)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param string $query
     * @param int $limit
     * @param int $paginate
     * @return mixed
     * @author Bytesoft
     */
    public function getSearch($query, $limit = 10, $paginate = 10)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param int|array $category_id
     * @param int $paginate
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getByCategory($category_id, $paginate = 12, $limit = 0)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param bool $active
     * @return mixed
     * @author Bytesoft
     */
    public function getAllProducts($active = true)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param int $limit
     * @param array $args
     * @return mixed
     * @author Bytesoft
     */
    public function getPopularProducts($limit, array $args = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param \Eloquent|int $model
     * @return array
     */
    public function getRelatedProductGroupIds($model)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

}
