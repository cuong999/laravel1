<?php

namespace Bytesoft\ACL\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class CreateSuperUserRequest extends Request
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
            'email' => 'required|max:60|min:6|email',
        ];
    }
}
