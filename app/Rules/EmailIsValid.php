<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailIsValid implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        
    $emailDomain = substr(strrchr($value, "@"), 1);
    $domain = 'zetech.ac.ke';

    if(strtolower($emailDomain) != strtolower($domain))
    {
        $fail('The email must be from zetech.ac.ke domain');
    };
    
    }
}
