<?php

namespace Bytesoft\Menu\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class MenuRequest extends Request
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
            'name' => 'required|min:3|max:120',
        ];
    }
}
