<?php
namespace App\Services;

use App\User;

class UserServices
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function get()
    {
        return $this->user->get();
    }
}