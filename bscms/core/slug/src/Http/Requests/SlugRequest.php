<?php

namespace Bytesoft\Slug\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class SlugRequest extends Request
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
            'name' => 'required',
            'slug_id' => 'required',
        ];
    }
}
