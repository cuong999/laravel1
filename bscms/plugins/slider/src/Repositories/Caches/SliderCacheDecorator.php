<?php

namespace Bytesoft\Slider\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;
use Bytesoft\Slider\Repositories\Interfaces\SliderInterface;

class SliderCacheDecorator extends CacheAbstractDecorator implements SliderInterface
{
    /**
     * @var SliderInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * SliderCacheDecorator constructor.
     * @param SliderInterface $repository
     * @param CacheInterface $cache
     * @author Sang Nguyen
     */
    public function __construct(SliderInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
