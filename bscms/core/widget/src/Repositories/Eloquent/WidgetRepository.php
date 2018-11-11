<?php

namespace Bytesoft\Widget\Repositories\Eloquent;

use Bytesoft\Support\Repositories\Eloquent\RepositoriesAbstract;
use Bytesoft\Widget\Repositories\Interfaces\WidgetInterface;

class WidgetRepository extends RepositoriesAbstract implements WidgetInterface
{
    /**
     * @var string
     */
    protected $screen = WIDGET_MANAGER_MODULE_SCREEN_NAME;
    
    /**
     * Get all theme widgets
     * @param string $theme
     * @return mixed
     * @author Bytesoft
     */
    public function getByTheme($theme)
    {
        $data = $this->model->where('theme', '=', $theme)->get();
        $this->resetModel();
        return $data;
    }
}
