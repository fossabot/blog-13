<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class FileUploadRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file' => [
                'required',
                'image',
                Rule::dimensions()->maxWidth(1000)->maxHeight(1000)->ratio(1),
            ],
        ];
    }
}
