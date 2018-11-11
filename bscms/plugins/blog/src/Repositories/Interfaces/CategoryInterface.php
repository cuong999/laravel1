<?php

namespace Bytesoft\Blog\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Support\Collection;

interface CategoryInterface extends RepositoryInterface
{

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function getDataSiteMap();

    /**
     * @param int $limit
     * @author Bytesoft
     */
    public function getFeaturedCategories($limit);

    /**
     * @param array $condition
     * @return mixed
     * @author Bytesoft
     */
    public function getAllCategories(array $condition = []);

    /**
     * @param int $id
     * @return mixed
     */
    public function getCategoryById($id);

    /**
     * @param array $select
     * @param array $orderBy
     * @return Collection
     */
    public function getCategories(array $select, array $orderBy);

    /**
     * @param int $id
     * @return array|null
     */
    public function getAllRelatedChildrenIds($id);

    /**
     * @param array $condition
     * @return mixed
     * @author Bytesoft
     */
    public function getAllCategoriesWithChildren(array $condition = [], array $with = [], array $select = ['*']);
}
