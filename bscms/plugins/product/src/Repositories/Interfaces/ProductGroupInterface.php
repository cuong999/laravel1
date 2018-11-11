<?php

namespace Bytesoft\Product\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface ProductGroupInterface extends RepositoryInterface
{
    /**
     * @return mixed
     * @author thuandc@bytesoft.net
     */
    public function getDataSiteMap();

    /**
     * @param int $limit
     * @author thuandc@bytesoft.net
     */
    public function getFeaturedProductGroups($limit);

    /**
     * @param array $condition
     * @return mixed
     * @author thuandc@bytesoft.net
     */
    public function getAllProductGroups();

    /**
     * @param int $id
     * @return mixed
     */
    public function getProductGroupById($id);

    /**
     * @param array $select
     * @param array $orderBy
     * @return Collection
     */
    public function getProductGroups(array $select, array $orderBy);

    /**
     * @param int $id
     * @return array|null
     */
    public function getAllRelatedChildrenIds($id);

    /**
     * @param array $condition
     * @return mixed
     * @author thuandc@bytesoft.net
     */
    public function getAllProductGroupsWithChildren(array $condition = [], array $with = [], array $select = ['*']);

}
