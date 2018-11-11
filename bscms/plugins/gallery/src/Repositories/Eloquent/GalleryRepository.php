<?php

namespace Bytesoft\Gallery\Repositories\Eloquent;

use Bytesoft\Support\Repositories\Eloquent\RepositoriesAbstract;
use Bytesoft\Gallery\Repositories\Interfaces\GalleryInterface;

class GalleryRepository extends RepositoriesAbstract implements GalleryInterface
{

    /**
     * @var string
     */
    protected $screen = GALLERY_MODULE_SCREEN_NAME;

    /**
     * Get all galleries.c
     *
     * @return mixed
     * @author Bytesoft
     */
    public function getAll()
    {
        $data = $this->model->where('galleries.status', '=', 1);

        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function getDataSiteMap()
    {
        $data = $this->model->where('galleries.status', '=', 1)
            ->select('galleries.*')
            ->orderBy('galleries.created_at', 'desc');
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param $limit
     * @return mixed
     * @author Bytesoft
     */
    public function getFeaturedGalleries($limit)
    {
        $data = $this->model->with(['user'])->where(['galleries.status' => 1, 'galleries.featured' => 1])
            ->select('galleries.id', 'galleries.name', 'galleries.user_id', 'galleries.image', 'galleries.created_at')
            ->orderBy('galleries.order', 'asc')
            ->limit($limit);
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }
}
