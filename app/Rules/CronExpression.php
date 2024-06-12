<?php

namespace App\Rules;

use Cron\CronExpression as CronValidator;
use Illuminate\Contracts\Validation\Rule;

class CronExpression implements Rule
{
    public function passes($attribute, $value)
    {
        try {
            return CronValidator::isValidExpression($value);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function message()
    {
        return 'The :attribute field contains an invalid cron expression.';
    }
}

