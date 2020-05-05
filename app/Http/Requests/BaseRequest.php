<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BaseRequest
 * @package App\Http\Requests
 */
abstract class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}