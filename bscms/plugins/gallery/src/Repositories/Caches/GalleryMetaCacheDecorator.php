<?php

namespace Bytesoft\Gallery\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Gallery\Repositories\Interfaces\GalleryMetaInterface;
use Bytesoft\Support\Services\Cache\CacheInterface;

class GalleryMetaCacheDecorator extends CacheAbstractDecorator implements GalleryMetaInterface
{
    /**
     * @var GalleryMetaInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * GalleryCacheDecorator constructor.
     * @param GalleryMetaInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(GalleryMetaInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
