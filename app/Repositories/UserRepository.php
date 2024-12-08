<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function create(User $user): bool
    {
        return $user->save();
    }
}
