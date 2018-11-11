<?php

namespace Bytesoft\Product\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class ProductRequest extends Request
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
            'complete_at' => 'required',
        ];
    }
}
