<?php

namespace Bytesoft\Blog\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class TagRequest extends Request
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
            'slug' => 'required|max:120',
            'description' => 'max:400',
        ];
    }
}
