<?php

namespace Tests;

use Joe\User\ClientTrait;

class ClientTraitTest extends TestsAbstract
{

    public function testTrait()
    {
        $mock = $this->getMockForTrait(ClientTrait::class);
        $response = $this->mockResponse('');
        $client = $this->mockClient($response);

        $mock->setClient($client);

        $clientFromTrait = $mock->getClient();
        $this::assertSame($client, $clientFromTrait);
    }
}
