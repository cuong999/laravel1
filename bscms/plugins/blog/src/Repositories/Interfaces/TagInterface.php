<?php

namespace Bytesoft\Blog\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface TagInterface extends RepositoryInterface
{

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function getDataSiteMap();

    /**
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getPopularTags($limit);

    /**
     * @param bool $active
     * @return mixed
     * @author Bytesoft
     */
    public function getAllTags($active = true);
}
