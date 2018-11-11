<?php

namespace Bytesoft\Support\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * @author Bytesoft
     */
    public function authorize()
    {
        return true;
    }
}
