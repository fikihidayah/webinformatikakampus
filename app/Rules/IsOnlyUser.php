<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class IsOnlyUser implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $id;
    public function __construct(int $id)
    {
        $this->id = $id;
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
        $isHas = User::getUserOnly($value, $this->id);
        if ($isHas > 0) return false;
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email user sudah ada silahkan tambahkan yang lain.';
    }
}
