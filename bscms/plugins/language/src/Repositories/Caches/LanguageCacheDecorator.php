<?php

namespace Bytesoft\Language\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;
use Bytesoft\Language\Repositories\Interfaces\LanguageInterface;

class LanguageCacheDecorator extends CacheAbstractDecorator implements LanguageInterface
{
    /**
     * @var LanguageInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * LanguageCacheDecorator constructor.
     * @param LanguageInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(LanguageInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    /**
     * @param array $select
     * @return mixed
     * @author Bytesoft
     * @since 2.1
     */
    public function getActiveLanguage($select = ['*'])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param array $select
     * @return mixed
     * @author Bytesoft
     * @since 2.2
     */
    public function getDefaultLanguage($select = ['*'])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
