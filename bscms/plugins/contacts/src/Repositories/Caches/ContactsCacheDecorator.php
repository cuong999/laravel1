<?php

namespace Bytesoft\Contacts\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;
use Bytesoft\Contacts\Repositories\Interfaces\ContactsInterface;

class ContactsCacheDecorator extends CacheAbstractDecorator implements ContactsInterface
{
    /**
     * @var ContactsInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * ContactsCacheDecorator constructor.
     * @param ContactsInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(ContactsInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
