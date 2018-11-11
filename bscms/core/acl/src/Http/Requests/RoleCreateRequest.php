<?php

namespace Bytesoft\ACL\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class RoleCreateRequest extends Request
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
            'name' => 'required|max:60|min:3',
            'description' => 'required|max:255',
        ];
    }
}
