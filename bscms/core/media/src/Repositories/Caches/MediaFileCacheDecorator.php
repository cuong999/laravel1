<?php

namespace Bytesoft\Media\Repositories\Caches;

use Bytesoft\Media\Repositories\Interfaces\MediaFileInterface;
use Bytesoft\Support\Repositories\Caches\CacheAbstractDecorator;
use Bytesoft\Support\Services\Cache\CacheInterface;

class MediaFileCacheDecorator extends CacheAbstractDecorator implements MediaFileInterface
{

    /**
     * @var MediaFileInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * FileCacheDecorator constructor.
     * @param MediaFileInterface $repository
     * @param CacheInterface $cache
     * @author Bytesoft
     */
    public function __construct(MediaFileInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function getSpaceUsed()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function getSpaceLeft()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function getQuota()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function getPercentageUsed()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param $name
     * @param $folder
     * @return mixed
     * @author Bytesoft
     */
    public function createName($name, $folder)
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }

    /**
     * @param $name
     * @param $extension
     * @param $folder
     * @return mixed
     * @author Bytesoft
     */
    public function createSlug($name, $extension, $folder)
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }

    /**
     * @param $folderId
     * @param array $params
     * @param bool $withFolders
     * @param array $folderParams
     * @return mixed
     */
    public function getFilesByFolderId($folderId, array $params = [], $withFolders = true, $folderParams = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function emptyTrash()
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }

    /**
     * @param $folderId
     * @param array $params
     * @param bool $withFolders
     * @param array $folderParams
     * @return mixed
     */
    public function getTrashed($folderId, array $params = [], $withFolders = true, $folderParams = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
