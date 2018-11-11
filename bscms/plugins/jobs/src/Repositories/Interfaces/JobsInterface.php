<?php

namespace Bytesoft\Jobs\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface JobsInterface extends RepositoryInterface
{

    /**
     * @param $slug
     * @param $status
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */

    function getBySlug($slug, $status);

    /**
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */

    function getListJobs();


    /**
     *
     * Get jobs to sitemap
     *
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    public function getDataSiteMap();


    /**
     *
     * Get All Jobs
     *
     * @param int $active
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    public function getAllJobs($active = 1);


    /**
     *
     * Get Popular Jobs
     *
     * @param $limit
     * @param array $args
     * @return mixed
     * author thuandc@bytesoft.net
     * website bytesoft.vn
     */
    public function getPopularJobs($limit = 5);


    /**
     *
     * Get Feature Jobs
     *
     * @param int $limit
     * @return mixed
     * author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    public function getFeatured($limit = 5);


    /**
     *
     * Get related Jobs
     *
     * @param $id
     * @param int $limit
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    public function getRelated($id, $limit = 5);

}
