<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Hash;

class CurrentPassword implements Rule
{
    /**
     * Determine if the validation rule passes.
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Hash::check($value, auth()->user()->password);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return trans('validation.current_password');
    }
}
