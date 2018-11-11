<?php

namespace Bytesoft\Page\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class PageRequest extends Request
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
            'slug' => 'required',
        ];
    }
}
