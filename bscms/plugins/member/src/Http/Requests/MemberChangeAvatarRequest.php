<?php

namespace Bytesoft\Member\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class MemberChangeAvatarRequest extends Request
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
            'avatar' => 'required|image|mimes:jpg,jpeg,png',
        ];
    }
}
