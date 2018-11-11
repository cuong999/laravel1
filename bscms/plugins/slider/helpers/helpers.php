<?php

use Bytesoft\Slider\Repositories\Interfaces\SliderInterface;

if (!function_exists('get_all_slider')){
    function get_all_slider()
    {
        return app(SliderInterface::class)->get_slider();
    }
}