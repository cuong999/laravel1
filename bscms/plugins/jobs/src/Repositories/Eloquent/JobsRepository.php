<?php

namespace Bytesoft\Jobs\Repositories\Eloquent;

use Bytesoft\Support\Repositories\Eloquent\RepositoriesAbstract;
use Bytesoft\Jobs\Repositories\Interfaces\JobsInterface;


class JobsRepository extends RepositoriesAbstract implements JobsInterface
{
    /**
     *
     * Jobs creen name
     *
     * @var string
     */
    protected $screen = JOBS_MODULE_SCREEN_NAME;


    /**
     *
     * Get Jobs by Slug
     *
     * @param $slug
     * @param $status
     * @return mixed|void
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    public function getBySlug($slug, $status)
    {

    }


    /**
     *
     * Get list Jobs with param
     *
     * @param array $selected
     * @param int $limit
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    public function getListJobs(array $selected = [], $limit = 7)
    {
        $data = $this->model
            ->where('jobs.status', '=', 1)
            ->whereNotIn('jobs.id', $selected)
            ->orderBy('jobs.created_at', 'desc')
            ->limit($limit)
            ->orderBy('jobs.created_at', 'desc');
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }


    /**
     *
     * Get all jobs to sitemap
     *
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */

    function getDataSiteMap()
    {
        $data = $this->model
            ->where('jobs.status', '=', 1)
            ->select('jobs.*')
            ->orderBy('jobs.created_at', 'desc');
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     *
     * Get featured Jobs
     *
     * @param int $limit
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    function getFeatured($limit = 5)
    {
        $data = $this->model
            ->where('jobs.status', '=', 1)
            ->where('jobs.featured', '=', 1)
            ->select('jobs.*')
            ->orderBy('jobs.created_at', 'desc');
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }


    /**
     *
     * Get All Jobs
     *
     * @param int $active
     * @return mixed|void
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */

    function getAllJobs($active = 1)
    {
        $data = $this->model
            ->where('jobs.status', '=', $active)
            ->select('jobs.*')
            ->orderBy('jobs.created_at', 'desc');
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }


    /**
     *
     * Get Popular Jobs with limit
     *
     * @param int $limit
     * @param array $arr
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */

    function getPopularJobs($limit = 5, array $arr = [])
    {
        $data = $this->model
            ->where('jobs.status', '=', 1)
            ->select('jobs.*')
            ->orderBy('jobs.view', desc);
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }


    public function getRelated($id, $limit = 3)
    {
        $data = $this->model
            ->where('jobs.status', '=', 1)
            ->where('jobs.id', '!=', $id)
            ->limit($limit)
            ->orderBy('jobs.created_at', 'desc');
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }


}
