<?php

namespace Bytesoft\Language\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;
use Bytesoft\Language\Repositories\Interfaces\LanguageMetaInterface;

class LanguageMetaCacheDecorator extends CacheAbstractDecorator implements LanguageMetaInterface
{
    /**
     * @var LanguageMetaInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * LanguageCacheDecorator constructor.
     * @param LanguageMetaInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(LanguageMetaInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
