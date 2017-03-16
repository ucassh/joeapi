<?php

namespace Tests;

use Joe\User\About;

class AboutTest extends TestsAbstract
{
    /** @var About */
    private $about;

    protected function setUp()
    {
        $response = $this->mockResponse(file_get_contents('tests/files/taksobietestuje.about.html'));
        $client = $this->mockClient($response);
        $user = $this->mockUser($client);

        $this->about = new About($user);
    }

    protected function tearDown()
    {
        $this->about = null;
    }

    public function testHelloMessage()
    {
        $hello = $this->about->getHelloMessage();
        $this::assertSame('Od 22 stycznia 2017   Nic ciekawego', $hello);
    }

    public function testBasicInfo()
    {
        $basicInfo = $this->about->getBasicInfo();
        $this::assertArrayHasKey('Status uczelniany', $basicInfo);
        $this::assertArrayHasKey('Stan', $basicInfo);
        $this::assertArrayHasKey('Miasto', $basicInfo);
        $this::assertArrayHasKey('Zajęcie', $basicInfo);
        $this::assertArrayHasKey('Zainteresowania ekstremalne', $basicInfo);
        $this::assertArrayHasKey('WWW', $basicInfo);
        $this::assertArrayHasKey('Status konta', $basicInfo);
        $this::assertArrayHasKey('GG', $basicInfo);
    }
}
