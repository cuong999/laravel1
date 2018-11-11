<?php

namespace Bytesoft\LogViewer\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class LogViewerRequest extends Request
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
