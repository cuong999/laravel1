<?php

namespace Bytesoft\Contact\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Contact\Repositories\Interfaces\ContactInterface;
use Bytesoft\Support\Services\Cache\CacheInterface;

class ContactCacheDecorator extends CacheAbstractDecorator implements ContactInterface
{

    /**
     * @var ContactInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * ContactCacheDecorator constructor.
     * @param ContactInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(ContactInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    /**
     * @param array $select
     * @return mixed
     * @author Bytesoft
     */
    public function getUnread($select = ['*'])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function countUnread()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
