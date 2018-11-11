<?php

namespace Bytesoft\Block\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;
use Bytesoft\Block\Repositories\Interfaces\BlockInterface;

class BlockCacheDecorator extends CacheAbstractDecorator implements BlockInterface
{
    /**
     * @var BlockInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * BlockCacheDecorator constructor.
     * @param BlockInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(BlockInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    /**
     * @param string $name
     * @param int $id
     * @return mixed
     * @author Bytesoft
     */
    public function createSlug($name, $id)
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }
}
