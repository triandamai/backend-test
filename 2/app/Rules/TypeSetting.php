<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TypeSetting implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if('TEMPERATURE' === $value) {
            return true;
        } else if('BLOODPRESSURE' === $value) {
            return true;
        } else if('SLEEP' === $value) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Key Must TEMPERATURE or BLOODPRESSURE or BLOODPRESSURE';
    }
}
