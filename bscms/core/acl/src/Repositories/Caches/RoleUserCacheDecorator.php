<?php

namespace Bytesoft\ACL\Repositories\Caches;

use Bytesoft\ACL\Repositories\Interfaces\RoleUserInterface;
use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;

class RoleUserCacheDecorator extends CacheAbstractDecorator implements RoleUserInterface
{
    /**
     * @var RoleUserInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * UserCacheDecorator constructor.
     * @param RoleUserInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(RoleUserInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
