<?php

use Bytesoft\Service\Repositories\Interfaces\ServiceInterface;
use Bytesoft\Service\Supports\PostFormat;

if(!function_exists('get_service')){

    /**
     *
     * Get service on view
     *
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    function get_service($limit = 3){
        return app(ServiceInterface::class)->getService();
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



