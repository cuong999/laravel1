<?php

namespace Bytesoft\Media\Repositories\Caches;

use Bytesoft\Media\Repositories\Interfaces\MediaSettingInterface;
use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;

class MediaSettingCacheDecorator extends CacheAbstractDecorator implements MediaSettingInterface
{
    /**
     * @var MediaSettingInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * MediaSettingCacheDecorator constructor.
     * @param MediaSettingInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(MediaSettingInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
