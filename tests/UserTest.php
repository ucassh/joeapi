<?php
namespace Tests;

use Joe\Fan;
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

        $fans = $user->fans();
        $this->assertEquals(1, $fans->count(), 'Quantity of fans doesn\'t match');

        /** @var Fan $fan */
        foreach ($fans as $fan) {
            $this->assertSame($user, $fan->whom(), "Fan instance should be a fan of User instance");
        }

        $this->assertEquals("onlyonefan", $fan->id(), "Fan ID mismatch");

        $fanSince = $fan->since()->format("Y-m-d H:i:s");
        $this->assertEquals("2015-06-11 20:58:15", $fanSince, 'Incorrect \'became a fan\' time ');
    }
}
