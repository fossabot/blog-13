<?php

namespace App\Http\Requests\Admin;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['string', 'max:255'],
            'content' => ['required'],
        ];
    }

    /**
     * @return array
     */
    public function pageFillData()
    {

        return [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'content_raw' => $this->get('content'),
            'user_id' => Auth::id(),
            'category_id' => 1,
            'type' => 'page',
            'meta_description' => $this->title,
            'is_draft' => false,
            'published_at' => now()
        ];
    }
}
