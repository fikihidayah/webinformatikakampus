<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StrengthPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $length = 10;

    private $lengthCheck = false;

    private $uppercaseCheck = false;

    private $numericCheck = false;


    public function __construct(int $length)
    {
        $this->length = $length;
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
        $this->lengthCheck = strlen($value) >= $this->length;
        $this->uppercaseCheck = strtolower($value) !== $value;
        $this->numericCheck = (bool) preg_match('/[0-9]/', $value);
        if ($this->lengthCheck && $this->uppercaseCheck && $this->numericCheck) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Password minimal {$this->length} karakter dan mengandung satu huruf besar dan satu angka";;
    }
}
