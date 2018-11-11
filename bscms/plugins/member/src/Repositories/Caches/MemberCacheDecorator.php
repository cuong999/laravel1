<?php

namespace Bytesoft\Member\Repositories\Caches;

use Bytesoft\Member\Repositories\Interfaces\MemberInterface;
use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;

class MemberCacheDecorator extends CacheAbstractDecorator implements MemberInterface
{
    /**
     * @var MemberInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * MemberCacheDecorator constructor.
     * @param MemberInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(MemberInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
