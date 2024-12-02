<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EnglishOnly implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
         // Check if the value contains only English letters (A-Z, a-z)
         if (!preg_match('/^[a-zA-Z\s\.,!\?-]+$/', $value)) { // Regular expression to allow English letters, space, and simple symbols (, . - ! ?)
            // Call the $fail closure with a custom error message if validation fails
            $fail("The $attribute field may only contain English letters.");
        }
    }
}
