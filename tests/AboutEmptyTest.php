<?php

namespace Tests;

use Joe\User\About;

class AboutEmptyTest extends TestsAbstract
{
    /** @var About */
    private $about;

    protected function setUp()
    {
        $response = $this->mockResponse(file_get_contents('tests/files/taksobietestuje.less.about.html'));
        $client = $this->mockClient($response);
        $user = $this->mockUser($client);

        $this->about = new About($user);
    }

    protected function tearDown()
    {
        $this->about = null;
    }

    public function testEmptyBasicInfo()
    {
        $basicInfo = $this->about->getBasicInfo();
        $this::assertEmpty($basicInfo);
    }

    public function testEmptyLocalization()
    {
        $localization = $this->about->getLocalization();
        $this::assertEmpty($localization);
    }
}
