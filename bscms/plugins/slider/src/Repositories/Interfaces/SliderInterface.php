<?php

namespace Bytesoft\Slider\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface SliderInterface extends RepositoryInterface
{

    /**
     * @return mixed
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    public function get_slider();
}
