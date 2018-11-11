<?php

namespace Bytesoft\Backup\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class BackupRequest extends Request
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
