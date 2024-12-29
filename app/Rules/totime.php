<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class totime implements Rule
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
        
        $earliestTime = '06:00:00';
        $lastTime = '23:00:00';

        return $value >= $earliestTime && $value <= $lastTime;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Choose a time between 6:00 and 23:00.';
    }
}
