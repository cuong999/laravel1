<?php

namespace Bytesoft\Blog\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Blog\Repositories\Interfaces\TagInterface;
use Bytesoft\Support\Services\Cache\CacheInterface;

class TagCacheDecorator extends CacheAbstractDecorator implements TagInterface
{

    /**
     * @var TagInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * @var string
     */
    protected $object = 'tags';

    /**
     * TagCacheDecorator constructor.
     * @param TagInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(TagInterface $repository, CacheInterface $cache)
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
    public function getPopularTags($limit)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param bool $active
     * @return mixed
     * @author Bytesoft
     */
    public function getAllTags($active = true)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
