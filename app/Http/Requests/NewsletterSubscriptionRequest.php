<?php

namespace App\Http\Requests;


class NewsletterSubscriptionRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:newsletter_subscriptions',
        ];
    }
}
