<?php

namespace Bytesoft\Blog\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class CategoryRequest extends Request
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
            'description' => 'max:400',
            'slug' => 'required',
            'order' => 'required|integer|min:0',
        ];
    }
}
