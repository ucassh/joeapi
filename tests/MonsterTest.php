<?php

namespace Tests;

use Joe\Monster;

/**
 * @preserveGlobalState disabled
 */
class MonsterTest extends TestsAbstract
{
    /** @var Monster */
    protected $monster;

    protected function setUp()
    {
        $mock = \Mockery::mock('alias:Joe\Connection');
        $mock->shouldReceive('login');
        $mock->shouldReceive('client');

        $this->monster = new Monster('login', 'password');
    }

    protected function tearDown()
    {
        $this->monster = null;
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetUser()
    {
        $username = 'test';
        $user = $this->monster->user($username);

        $this::assertSame($username, $user->nickName());
    }
}
