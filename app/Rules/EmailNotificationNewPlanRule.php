<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Validator;

class EmailNotificationNewPlanRule implements Rule
{
    public function __construct()
    {
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
        $validator = Validator::make(
            ['employees' => $value],
            ['employees.*.email' => 'required|email|exists:employees,email']
        );
        return $validator->passes();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Dữ liệu không hợp lệ';
    }
}