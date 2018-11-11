<?php

namespace Bytesoft\Widget\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;
use Bytesoft\Widget\Repositories\Interfaces\WidgetInterface;

class WidgetCacheDecorator extends CacheAbstractDecorator implements WidgetInterface
{
    /**
     * @var WidgetInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * WidgetCacheDecorator constructor.
     * @param WidgetInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(WidgetInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    /**
     * Get all theme widgets
     * @param string $theme
     * @return mixed
     * @author Bytesoft
     */
    public function getByTheme($theme)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
