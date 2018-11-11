<?php

namespace Bytesoft\Gallery\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Gallery\Repositories\Interfaces\GalleryInterface;
use Bytesoft\Support\Services\Cache\CacheInterface;

class GalleryCacheDecorator extends CacheAbstractDecorator implements GalleryInterface
{
    /**
     * @var GalleryInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * GalleryCacheDecorator constructor.
     * @param GalleryInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(GalleryInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    /**
     * Get all galleries.
     *
     * @return mixed
     * @author Bytesoft
     */
    public function getAll()
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
     * @param $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getFeaturedGalleries($limit)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
