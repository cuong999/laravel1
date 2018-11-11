<?php

namespace Bytesoft\Gallery\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface GalleryInterface extends RepositoryInterface
{

    /**
     * Get all galleries.
     *
     * @return mixed
     * @author Bytesoft
     */
    public function getAll();

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function getDataSiteMap();

    /**
     * @param $limit
     * @author Bytesoft
     */
    public function getFeaturedGalleries($limit);
}
