<?php

namespace Bytesoft\Note\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;
use Bytesoft\Note\Repositories\Interfaces\NoteInterface;

class NoteCacheDecorator extends CacheAbstractDecorator implements NoteInterface
{
    /**
     * @var NoteInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * NoteCacheDecorator constructor.
     * @param NoteInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(NoteInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
