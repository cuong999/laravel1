<?php

namespace Bytesoft\Svprocess\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;
use Bytesoft\Svprocess\Repositories\Interfaces\SvprocessInterface;

class SvprocessCacheDecorator extends CacheAbstractDecorator implements SvprocessInterface
{
    /**
     * @var SvprocessInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * SvprocessCacheDecorator constructor.
     * @param SvprocessInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(SvprocessInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
