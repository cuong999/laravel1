<?php

namespace Bytesoft\Slider\Repositories\Eloquent;

use Bytesoft\Support\Repositories\Eloquent\RepositoriesAbstract;
use Bytesoft\Slider\Repositories\Interfaces\SliderInterface;

class SliderRepository extends RepositoriesAbstract implements SliderInterface
{
    /**
     * @var string
     */
    protected $screen = SLIDER_MODULE_SCREEN_NAME;

    /**
     * @return mixed|void
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    function get_slider()
    {
        $data = $this->model
            ->where([
                'sliders.status' => 1,
            ])
            ->orderBy('sliders.created_at', 'desc');

        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }
}
