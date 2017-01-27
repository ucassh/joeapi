<?php

namespace Joe;

if (!defined('MAX_FILE_SIZE')) {
    define('MAX_FILE_SIZE', 600000000);
}

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
}
