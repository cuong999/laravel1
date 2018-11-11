<?php

namespace Bytesoft\Page\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface PageInterface extends RepositoryInterface
{

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function getDataSiteMap();

    /**
     * @param $limit
     * @author Bytesoft
     */
    public function getFeaturedPages($limit);

    /**
     * @param $array
     * @param array $select
     * @return mixed
     * @author Bytesoft
     */
    public function whereIn($array, $select = []);

    /**
     * @param $query
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getSearch($query, $limit = 10);

    /**
     * @param bool $active
     * @return mixed
     * @author Bytesoft
     */
    public function getAllPages($active = true);
}
