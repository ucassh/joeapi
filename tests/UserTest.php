<?php
namespace Tests;

use Joe\Http\Client;
use Joe\Http\Response;
use Joe\User;

class UserTest extends TestsAbstract
{
    public function testGetUserFans()
    {
        $response = $this->createMock(Response::class);
        $response
            ->expects($this->any())
            ->method('getBody')
            ->willReturn(file_get_contents('tests/files/fans.html'));

        $client = $this->createMock(Client::class);
        $client
            ->expects($this->any())
            ->method('request')
            ->willReturn($response);

        $user = new User('taksobietestuje');
        $user->setClient($client);

        $this->assertEquals(1, $user->fans()->count(), 'Quantity of fans doesn\'t match');
    }
}
