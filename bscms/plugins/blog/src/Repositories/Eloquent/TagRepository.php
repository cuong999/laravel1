<?php

namespace Bytesoft\Blog\Repositories\Eloquent;

use Bytesoft\Support\Repositories\Eloquent\RepositoriesAbstract;
use Bytesoft\Blog\Repositories\Interfaces\TagInterface;

class TagRepository extends RepositoriesAbstract implements TagInterface
{

    /**
     * @var string
     */
    protected $screen = TAG_MODULE_SCREEN_NAME;

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function getDataSiteMap()
    {
        $data = $this->model->where('tags.status', '=', 1)
            ->select('tags.*')
            ->orderBy('tags.created_at', 'desc');
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param int $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getPopularTags($limit)
    {
        $data = $this->model->orderBy('tags.id', 'DESC')
            ->select('tags.*')
            ->limit($limit);
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param bool $active
     * @return mixed
     * @author Bytesoft
     */
    public function getAllTags($active = true)
    {
        $data = $this->model->select('tags.*');
        if ($active) {
            $data = $data->where(['tags.status' => 1]);
        }
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }
}
