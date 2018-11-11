<?php

namespace Bytesoft\Jobs\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class JobsRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @author thuandc@bytesoft.net
     * website https://bytesoft.vn
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'max:400',
            'num' => 'required',
            'slug' => 'required|max:255',
            'place' => 'required',
            'expiration_at' => 'required',
            'content' => 'required',
            'interest' => 'required',
        ];
    }
}
