<?php 
use Bytesoft\Svprocess\Repositories\Interfaces\SvprocessInterface;

if(!function_exists('get_svprocess')){

    /**
     *
     * Get service on view
     *
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    function get_svprocess($limit = 4){
        return app(SvprocessInterface::class)->getSvprocess();
    }
}