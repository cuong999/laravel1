<?php

namespace Bytesoft\Menu\Repositories\Caches;

use Bytesoft\Menu\Repositories\Interfaces\MenuNodeInterface;
use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;

class MenuNodeCacheDecorator extends CacheAbstractDecorator implements MenuNodeInterface
{
    /**
     * @var MenuNodeInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * MenuCacheDecorator constructor.
     * @param MenuNodeInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(MenuNodeInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    /**
     * @param $menu_id
     * @param $parent_id
     * @param array $selects
     * @return mixed
     * @author Bytesoft
     */
    public function getByMenuId($menu_id, $parent_id, $select = ['*'])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
