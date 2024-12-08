<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{

    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }

    public function create(User $user): ?User
    {
        $a = 'a';
        if($this->userRepository->create($user))
            return $user;

        return null;
    }
}
