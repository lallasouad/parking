<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class fromtime implements Rule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        
        $earliestTime = '05:00:00';
        $lastTime = '22:00:00';

        return $value >= $earliestTime && $value <= $lastTime;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Choose a time between 5:00 and 22:00.';
    }
}
