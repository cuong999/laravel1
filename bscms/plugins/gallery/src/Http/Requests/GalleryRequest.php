<?php

namespace Bytesoft\Gallery\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class GalleryRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @author Bytesoft
     */
    public function rules()
    {
        return [
            'name' => 'required|max:120',
            'description' => 'required|max:400',
            'order' => 'required|integer|min:0',
        ];
    }
}
