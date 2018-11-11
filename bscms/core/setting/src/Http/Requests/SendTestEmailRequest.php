<?php

namespace Bytesoft\Setting\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class SendTestEmailRequest extends Request
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
            'email' => 'required|email',
        ];
    }
}
