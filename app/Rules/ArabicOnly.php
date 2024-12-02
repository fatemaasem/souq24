<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ArabicOnly implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
         // Check if the value contains only Arabic characters
         if (!is_string($value) || !preg_match('/^[\x{0600}-\x{06FF}\s\.,!؟-]+$/u', $value)) { // Regular expression to allow Arabic characters, space, and simple symbols (, . - ! ?)
            // Fail the validation with a custom message if it does not match
            $fail("The $attribute field must contain only Arabic characters.");
        }
    }
}
