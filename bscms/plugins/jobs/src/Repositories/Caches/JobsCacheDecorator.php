<?php

namespace Bytesoft\Jobs\Repositories\Caches;

use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;
use Bytesoft\Jobs\Repositories\Interfaces\JobsInterface;

class JobsCacheDecorator extends CacheAbstractDecorator implements JobsInterface
{
    /**
     * @var JobsInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * JobsCacheDecorator constructor.
     * @param JobsInterface $repository
     * @param CacheInterface $cache
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    public function __construct(JobsInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }


    /**
     *
     * Get content from Cache
     *
     * @param string $slug
     * @param int $status
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */


    public function getBySlug($slug, $status)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }


    public function getListJobs($limit = 5)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }


    public function getFeatured($limit = 5)
    {
        return $this->applyBeforeExecuteQuery(__FUNCTION__, func_get_args());
    }


    public function getPopularJobs($limit = 5)
    {
        return $this->applyBeforeExecuteQuery(__FUNCTION__, func_get_args());
    }


    public function getAllJobs($active = 1)
    {
        return $this->applyBeforeExecuteQuery(__FUNCTION__, func_get_args());
    }

    public function getDataSiteMap()
    {
        return $this->applyBeforeExecuteQuery(__FUNCTION__, func_get_args());
    }

    public function getRelated($id, $limit =5){
        return $this->applyBeforeExecuteQuery(__FUNCTION__, func_get_args());
    }



}
