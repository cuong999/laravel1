<?php

namespace Bytesoft\Setting\Repositories\Caches;

use Bytesoft\Setting\Repositories\Interfaces\SettingInterface;
use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;

class SettingCacheDecorator extends CacheAbstractDecorator implements SettingInterface
{
    /**
     * @var SettingInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * SettingCacheDecorator constructor.
     * @param SettingInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(SettingInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
