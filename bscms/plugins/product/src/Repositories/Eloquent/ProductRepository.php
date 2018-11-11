<?php

namespace Bytesoft\Product\Repositories\Eloquent;

use Bytesoft\Support\Repositories\Eloquent\RepositoriesAbstract;
use Bytesoft\Product\Repositories\Interfaces\ProductInterface;

class ProductRepository extends RepositoriesAbstract implements ProductInterface
{
    /**
     * @var string
     */
    protected $screen = PRODUCT_MODULE_SCREEN_NAME;


    public function getFeatured($limit = 5)
    {
        $data = $this->model
            ->where([
                'products.status' => 1,
                'products.featured' => 1,
            ])
            ->limit($limit)
            ->orderBy('products.created_at', 'desc');

        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param array $selected
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getListProductNonInList(array $selected = [], $limit = 7)
    {
        $data = $this->model
            ->where('products.status', '=', 1)
            ->whereNotIn('products.id', $selected)
            ->orderBy('products.created_at', 'desc')
            ->limit($limit)
            ->orderBy('products.created_at', 'desc');
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param int $id
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getRelated($id, $limit = 3)
    {
        $data = $this->model
            ->where('products.status', '=', 1)
            ->where('products.id', '!=', $id)
            ->limit($limit)
            ->orderBy('products.created_at', 'desc');
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param int|array $product_group_id
     * @param int $paginate
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getByProductGroup($product_group_id, $paginate = 12, $limit = 0)
    {
        if (!is_array($product_group_id)) {
            $product_group_id = [$product_group_id];
        }
        $data = $this->model
            ->where('products.status', '=', 1)
            ->join('product_product_group', 'product_product_group.product_id', '=', 'products.id')
            ->join('product_groups', 'product_product_group.product_group_id', '=', 'product_groups.id')
            ->whereIn('product_product_group.product_group_id', $product_group_id)
            ->select('products.*')
            ->distinct()
            ->orderBy('products.created_at', 'desc');
        if ($paginate != 0) {
            return $this->applyBeforeExecuteQuery($data, $this->screen)->paginate($paginate);
        }
        return $this->applyBeforeExecuteQuery($data, $this->screen)->limit($limit)->get();
    }

    /**
     * @param int $user_id
     * @param int $paginate
     * @return mixed
     * @author Bytesoft
     */
    public function getByUserId($user_id, $paginate = 6)
    {
        $data = $this->model
            ->where(['products.status' => 1, 'products.user_id' => $user_id])
            ->select('products.*')
            ->orderBy('products.views', 'desc');
        return $this->applyBeforeExecuteQuery($data, $this->screen)->paginate($paginate);
    }

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function getDataSiteMap()
    {
        $data = $this->model
            ->where('products.status', '=', 1)
            ->select('products.*')
            ->orderBy('products.created_at', 'desc');
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param int $limit
     * @param int $product_group_id
     * @return mixed
     * @author Bytesoft
     */
    public function getRecentProducts($limit = 5, $product_group_id = 0)
    {
        $products = $this->model->where(['products.status' => 1]);

        if ($product_group_id != 0) {
            $products = $products->join('product_product_group', 'product_product_group.product_id', '=', 'products.id')
                ->where('product_product_group.product_group_id', '=', $product_group_id);
        }

        $data = $products->limit($limit)
            ->select('products.*')
            ->orderBy('products.created_at', 'desc');
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param string $query
     * @param int $limit
     * @param int $paginate
     * @return mixed
     * @author Bytesoft
     */
    public function getSearch($query, $limit = 10, $paginate = 10)
    {
        $products = $this->model->where('status', 1);
        foreach (explode(' ', $query) as $term) {
            $products = $products->where('name', 'LIKE', '%' . $term . '%');
        }

        $data = $products->select('products.*')
            ->orderBy('products.created_at', 'desc');
        if ($limit) {
            $data = $data->limit($limit);
        }

        if ($paginate) {
            return $this->applyBeforeExecuteQuery($data, $this->screen)->paginate($paginate);
        }
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param bool $active
     * @return mixed
     * @author Bytesoft
     */
    public function getAllProducts($active = true)
    {
        $data = $this->model->select('products.*');
        if ($active) {
            $data = $data->where(['products.status' => 1]);
        }

        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param int $limit
     * @param array $args
     * @return mixed
     * @author Bytesoft
     */
    public function getPopularProducts($limit, array $args = [])
    {
        $data = $this->model->orderBy('products.views', 'DESC')
            ->select('products.*')
            ->limit($limit);
        if (!empty(array_get($args, 'where'))) {
            $data = $data->where($args['where']);
        }
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param Eloquent|int $model
     * @return array
     */
    public function getRelatedProductGroupIds($model)
    {
        $model = $model instanceof Eloquent ? $model : $this->findById($model);

        try {
            return $model->product_groups()->allRelatedIds()->toArray();
        } catch (Exception $exception) {
            return [];
        }
    }
}
