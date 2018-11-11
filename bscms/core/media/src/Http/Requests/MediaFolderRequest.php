<?php

namespace Bytesoft\Media\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class MediaFolderRequest extends Request
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
            'name' => 'required|regex:/^[\pL\s\ \_\-0-9]+$/u',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.regex' => trans('media::media.name_invalid'),
        ];
    }
}
