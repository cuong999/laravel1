<?php

namespace Bytesoft\AuditLog\Repositories\Caches;

use Bytesoft\AuditLog\Repositories\Interfaces\AuditLogInterface;
use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;

/**
 * Class AuditLogCacheDecorator
 * @package Bytesoft\AuditLog\Repositories
 * @author Bytesoft
 * @since 16/09/2016 10:55 AM
 */
class AuditLogCacheDecorator extends CacheAbstractDecorator implements AuditLogInterface
{
    /**
     * @var AuditLogInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * PermissionCacheDecorator constructor.
     * @param AuditLogInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(AuditLogInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
