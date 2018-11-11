<?php

namespace Bytesoft\Table\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class BulkChangeRequest extends Request
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'class' => 'required',
        ];
    }
}