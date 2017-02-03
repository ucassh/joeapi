<?php

namespace Joe\User;

use Joe\User;

class About
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAllData()
    {
        // Equivalent of User::about
    }

}