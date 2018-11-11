<?php

namespace Bytesoft\Slug\Repositories\Caches;

use Bytesoft\Slug\Repositories\Interfaces\SlugInterface;
use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;

class SlugCacheDecorator extends CacheAbstractDecorator implements SlugInterface
{
    /**
     * @var SlugInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * SlugCacheDecorator constructor.
     * @param SlugInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(SlugInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
