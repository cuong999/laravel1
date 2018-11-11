<?php

namespace Bytesoft\Blog\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class PostRequest extends Request
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
            'name' => 'required|max:255',
            'description' => 'max:400',
            'categories' => 'required',
            'slug' => 'required|max:255',
        ];
    }
}
