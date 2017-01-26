<?php

namespace Tests;

abstract class TestsAbstract extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        if (!defined('MAX_FILE_SIZE')) {
            define('MAX_FILE_SIZE', 600000000);
        }
    }
}
