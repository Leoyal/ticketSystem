<?php
// app/Rules/ValidateUsernameExists.php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class ValidateUsernameExists implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the username exists in the database
        return User::where('uname', $value)->exists();
    }

    public function message()
    {
        return 'The selected username does not exist.';
    }
}