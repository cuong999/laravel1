<?php

namespace Bytesoft\CustomField\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class CreateFieldGroupRequest extends Request
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
            'order' => 'integer|min:0|required',
            'rules' => 'json|required',
            'title' => 'required|max:255',
            'status' => 'required',
        ];
    }
}
