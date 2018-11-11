<?php

namespace Bytesoft\Product\Repositories\Eloquent;

use Bytesoft\Support\Repositories\Eloquent\RepositoriesAbstract;
use Bytesoft\Product\Repositories\Interfaces\ProductGroupInterface;

class ProductGroupRepository extends RepositoriesAbstract implements ProductGroupInterface
{
    /**
     * @var string
     */
    protected $screen = PRODUCT_GROUP_MODULE_SCREEN_NAME;


    public function getDataSiteMap()
    {
        $data = $this->model
            ->where('product_groups.status', '=', 1)
            ->select('product_groups.*')
            ->orderBy('product_groups.created_at', 'desc');
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param int $limit
     * @author Bytesoft
     * @return $this
     */
    public function getFeaturedProductGroups($limit)
    {
        $data = $this->model
            ->where(['product_groups.status' => 1, 'product_groups.featured' => 1])
            ->select('product_groups.id', 'product_groups.name', 'product_groups.icon')
            ->orderBy('product_groups.order', 'asc')
            ->select('product_groups.*')
            ->limit($limit);
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param array $condition
     * @return mixed
     * @author Bytesoft
     */
    public function getAllProductGroups()
    {
        $data = $this->model
            ->select('product_groups.*')
            ->orderBy('product_groups.order', 'asc');

        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getProductGroupById($id)
    {
        $data = $this->model->where(['product_groups.id' => $id, 'product_groups.status' => 1]);
        return $this->applyBeforeExecuteQuery($data, $this->screen, true)->first();
    }

    /**
     * @param array $select
     * @param array $orderBy
     * @return Collection
     */
    public function getProductGroups(array $select, array $orderBy)
    {
        $data = $this->model->select($select);
        foreach ($orderBy as $by => $direction) {
            $data = $data->orderBy($by, $direction);
        }
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function getAllRelatedChildrenIds($id)
    {
        if ($id instanceof Eloquent) {
            $model = $id;
        } else {
            $model = $this->getFirstBy(['product_groups.id' => $id]);
        }
        if (!$model) {
            return null;
        }

        $result = [];

        $children = $model->children()->select('product_groups.id')->get();

        foreach ($children as $child) {
            $result[] = $child->id;
            $result = array_merge($this->getAllRelatedChildrenIds($child), $result);
        }
        $this->resetModel();
        return array_unique($result);
    }

    /**
     * @param array $condition
     * @return mixed
     * @author Bytesoft
     */
    public function getAllProductGroupsWithChildren(array $condition = [], array $with = [], array $select = ['*'])
    {
        $data = $this->model->where($condition)->with($with)->select($select);
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }
}
