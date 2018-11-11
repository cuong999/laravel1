<?php

namespace Bytesoft\Review\Http\Requests;

use Bytesoft\Support\Http\Requests\Request;

class ReviewRequest extends Request
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
            'name' => 'required|max:120',
            'link' => 'required_without:file||unique:reviews',
            'file' => 'required_without:link',
        ];
    }
}
