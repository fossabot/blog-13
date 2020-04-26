<?php

namespace App\Http\Requests;


class ClientStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'company' => 'required',
            'city' => 'required',
            'progress' => 'numeric|min:0|max:100',
        ];
    }
}
