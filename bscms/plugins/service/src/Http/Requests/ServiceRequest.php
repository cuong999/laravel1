<?php

namespace Bytesoft\Service\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class ServiceRequest extends Request
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
            'order' => 'required',
            'content' => 'required',
            'description' => 'required',
        ];
    }
}
