<?php

namespace Bytesoft\Setting\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class EmailTemplateRequest extends Request
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
            'email_subject' => $this->has('email_subject_key') ? 'required|string' : '',
            'email_content' => 'required|string',
        ];
    }
}
