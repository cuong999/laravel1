<?php

namespace Bytesoft\Svprocess\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class SvprocessRequest extends Request
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
        ];
    }
}
