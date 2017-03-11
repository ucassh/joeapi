<?php

namespace Tests;

use Joe\Connection;
use Joe\Http\GuzzleClient;
use Mockery as m;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class ConnectionTest extends \PHPUnit_Framework_TestCase
{
    public function testLogin()
    {
        $externalMock = m::mock('overload:Joe\Http\GuzzleClient');
        $externalMock->shouldReceive('request');

        $client = Connection::login('login', 'password');
        $this::assertSame(GuzzleClient::class, get_class($client));

        $secondInstanceOfClient = Connection::client();
        $this::assertSame($client, $secondInstanceOfClient);
    }
}
