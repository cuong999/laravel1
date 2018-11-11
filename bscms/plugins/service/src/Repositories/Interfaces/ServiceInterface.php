<?php

namespace Bytesoft\Service\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface ServiceInterface extends RepositoryInterface
{

    /**
     * Get service interface
     *
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */

    public function getService($limit = 4);

    /**
     *
     * Get data sitemap interface
     *
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    public function getDataSiteMap();
}
