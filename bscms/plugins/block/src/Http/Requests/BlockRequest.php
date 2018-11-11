<?php

namespace Bytesoft\Block\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class BlockRequest extends Request
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
            'alias' => 'required|max:120',
        ];
    }
}
