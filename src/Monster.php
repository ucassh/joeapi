<?php

namespace Joe;

use Joe\Archive\Archive;

class Monster
{
    public function __construct($login = null, $password = null)
    {
        if (isset($login) && isset($password)) {
            Connection::login($login, $password);
        }
    }

    public function user($id)
    {
        return new User($id);
    }

    public function archive()
    {
        return new Archive(Connection::client());
    }
}
