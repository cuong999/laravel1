<?php

namespace Bytesoft\Service\Repositories\Eloquent;

use Bytesoft\Support\Repositories\Eloquent\RepositoriesAbstract;
use Bytesoft\Service\Repositories\Interfaces\ServiceInterface;

class ServiceRepository extends RepositoriesAbstract implements ServiceInterface
{
    /**
     * @var string
     */
    protected $screen = SERVICE_MODULE_SCREEN_NAME;

    /**
     *
     * Get Service
     *
     * @return mixed|void
     */

    function getService($limit = 4)
    {
        $data = $this->model
            ->where('services.status', '=', 1)
            ->select('services.*')
            ->limit($limit)
            ->orderBy('services.order', 'asc');
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * Get data sitemap
     *
     * @return mixed|void
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    function getDataSiteMap()
    {
        $data = $this->model
            ->where('services.status', '=', 1)
            ->select('services.*')
            ->orderBy('services.created_at', 'desc');
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }
}
