<?php

namespace Bytesoft\ACL\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class ChangeProfileImageRequest extends Request
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
            'avatar_file' => 'required|image|mimes:jpg,jpeg,png',
        ];
    }
}
