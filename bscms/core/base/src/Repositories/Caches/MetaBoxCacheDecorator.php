<?php

namespace Bytesoft\Base\Repositories\Caches;

use Bytesoft\Base\Repositories\Interfaces\MetaBoxInterface;
use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;

class MetaBoxCacheDecorator extends CacheAbstractDecorator implements MetaBoxInterface
{
    /**
     * @var MetaBoxInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * MetaBoxCacheDecorator constructor.
     * @param MetaBoxInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(MetaBoxInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
