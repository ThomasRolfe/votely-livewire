<?php

namespace App\Support\CustomCollections;

use App\Models\User;

class UsersArray extends ClassArray
{
    protected function className(): string
    {
        return User::class;
    }
}
