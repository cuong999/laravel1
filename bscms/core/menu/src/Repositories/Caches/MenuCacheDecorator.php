<?php

namespace Bytesoft\Menu\Repositories\Caches;

use Bytesoft\Menu\Repositories\Interfaces\MenuInterface;
use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;

class MenuCacheDecorator extends CacheAbstractDecorator implements MenuInterface
{
    /**
     * @var MenuInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * MenuCacheDecorator constructor.
     * @param MenuInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(MenuInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    /**
     * @param $slug
     * @param $active
     * @param $selects
     * @return mixed
     * @author Bytesoft
     */
    public function findBySlug($slug, $active, $selects = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param $name
     * @return mixed
     * @author Bytesoft
     */
    public function createSlug($name)
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }
}
