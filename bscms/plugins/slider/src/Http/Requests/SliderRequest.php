<?php

namespace Bytesoft\Slider\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class SliderRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @author Sang Nguyen
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'background' => 'required',
        ];
    }
}
