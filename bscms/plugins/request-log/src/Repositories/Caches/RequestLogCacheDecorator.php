<?php

namespace Bytesoft\RequestLog\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;
use Bytesoft\RequestLog\Repositories\Interfaces\RequestLogInterface;

class RequestLogCacheDecorator extends CacheAbstractDecorator implements RequestLogInterface
{

    /**
     * @var RequestLogInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * PostCacheDecorator constructor.
     * @param RequestLogInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(RequestLogInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
