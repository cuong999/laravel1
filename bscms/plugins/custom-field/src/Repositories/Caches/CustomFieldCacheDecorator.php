<?php

namespace Bytesoft\CustomField\Repositories\Caches;

use Bytesoft\CustomField\Repositories\Interfaces\CustomFieldInterface;
use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;

class CustomFieldCacheDecorator extends CacheAbstractDecorator implements CustomFieldInterface
{
    /**
     * @var CustomFieldInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * CustomFieldCacheDecorator constructor.
     * @param CustomFieldInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(CustomFieldInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
