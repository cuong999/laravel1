<?php

namespace Bytesoft\Review\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;
use Bytesoft\Review\Repositories\Interfaces\ReviewInterface;

class ReviewCacheDecorator extends CacheAbstractDecorator implements ReviewInterface
{
    /**
     * @var ReviewInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * ReviewCacheDecorator constructor.
     * @param ReviewInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(ReviewInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
