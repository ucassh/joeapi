<?php

namespace Tests;

use Joe\User\SendedContent;

class SendedContentTest extends TestsAbstract
{

    public function testArtPagesQuantity()
    {
        $response = $this->mockResponse(file_get_contents('tests/files/articles_list.html'));
        $client = $this->mockClient($response);
        $user = $this->mockUser($client);

        $sended = new SendedContent($user);
        $this->assertEquals(576, $sended->artPagesQuantity());
    }
}
