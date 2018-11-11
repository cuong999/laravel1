<?php

use Bytesoft\Jobs\Repositories\Interfaces\JobsInterface;
use Bytesoft\Jobs\Supports\PostFormat;

if (!function_exists('get_featured_jobs')) {
    /**
     * @param $limit
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    function get_featured_jobs($limit = 4)
    {
        return app(JobsInterface::class)->getFeatured($limit);
    }
}

if (!function_exists('get_latest_jobs')) {
    /**
     * @param $limit
     * @param array $excepts
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    function get_latest_jobs($limit, $excepts = [])
    {
        return app(JobsInterface::class)->getListJobs($excepts, $limit);
    }
}


if (!function_exists('get_related_posts')) {
    /**
     * @param $current_slug
     * @param $limit
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    function get_related_posts($current_slug, $limit)
    {
        return app(JobsInterface::class)->getRelated($current_slug, $limit);
    }
}


if (!function_exists('get_jobs_by_user')) {
    /**
     * @param $user_id
     * @param $paginate
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    function get_jobs_by_user($user_id, $paginate = 12)
    {
        return app(JobsInterface::class)->getByUserId($user_id, $paginate);
    }
}

if (!function_exists('get_all_jobs')) {
    /**
     * @param boolean $active
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    function get_all_jobs($active = 1)
    {
        return app(JobsInterface::class)->getAllJobs($active);
    }
}

if (!function_exists('get_recent_jobs')) {
    /**
     * @param $limit
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    function get_recent_jobs($limit)
    {
        return app(JobsInterface::class)->getRecentJobs($limit);
    }
}


if (!function_exists('get_popular_jobs')) {
    /**
     * @param integer $limit
     * @param array $args
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    function get_popular_jobs($limit = 10, array $args = [])
    {
        return app(PostInterface::class)->getPopularJobs($limit, $args);
    }
}


if (!function_exists('register_jobs_format')) {
    /**
     * @param array $formats
     * @return void
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    function register_jobs_format(array $formats)
    {
        PostFormat::registerJobsFormat($formats);
    }
}

if (!function_exists('get_post_formats')) {
    /**
     * @param bool $convert_to_list
     * @return array
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    function get_jobs_formats($convert_to_list = false)
    {
        return PostFormat::getJobsFormats($convert_to_list);
    }
}
