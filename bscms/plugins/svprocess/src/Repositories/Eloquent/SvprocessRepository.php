<?php

namespace Bytesoft\Svprocess\Repositories\Eloquent;

use Bytesoft\Support\Repositories\Eloquent\RepositoriesAbstract;
use Bytesoft\Svprocess\Repositories\Interfaces\SvprocessInterface;

class SvprocessRepository extends RepositoriesAbstract implements SvprocessInterface
{
    /**
     * @var string
     */
    protected $screen = SVPROCESS_MODULE_SCREEN_NAME;
     // * @return mixed|void
     // */

    function getSvprocess($limit = 4)
    {
        $data = $this->model
            ->where('svprocesses.status', '=', 1)
            ->select('svprocesses.*')
            ->limit($limit)
            ->orderBy('svprocesses.order', 'asc');
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * Get data sitemap
     *
     * @return mixed|void
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
}
