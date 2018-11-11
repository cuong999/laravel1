<?php

namespace Bytesoft\Product\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface ProductInterface extends RepositoryInterface
{

    /**
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getFeatured($limit = 5);

    /**
     * @param array $selected
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getListProductNonInList(array $selected = [], $limit = 7);

    /**
     * @param int|array $product_group_id
     * @param int $paginate
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getByProductGroup($product_group_id, $paginate = 12, $limit = 0);

    /**
     * @param int $user_id
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getByUserId($user_id, $limit = 6);

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function getDataSiteMap();


    public function getRelated($id, $limit = 3);

    /**
     * @param int $limit
     * @param int $product_group_id
     * @return mixed
     * @author Bytesoft
     */
    public function getRecentProducts($limit = 5, $product_group_id = 0);

    /**
     * @param string $query
     * @param int $limit
     * @param int $paginate
     * @return mixed
     * @author Bytesoft
     */
    public function getSearch($query, $limit = 10, $paginate = 10);

    /**
     * @param bool $active
     * @return mixed
     * @author Bytesoft
     */
    public function getAllProducts($active = true);

    /**
     * @param int $limit
     * @param array $args
     * @return mixed
     * @author Bytesoft
     */
    public function getPopularProducts($limit, array $args = []);

    /**
     * @param \Eloquent|int $model
     * @return array
     */
    public function getRelatedProductGroupIds($model);
}
