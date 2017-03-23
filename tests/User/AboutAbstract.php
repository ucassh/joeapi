<?php

namespace Tests;

use Joe\User\About;

abstract class AboutAbstract extends TestsAbstract
{
    /** @var About */
    protected $about;

    protected function setUp()
    {
        $response = $this->mockResponse($this->getContent());
        $client = $this->mockClient($response);
        $user = $this->mockUser($client);

        $this->about = new About($user);
    }

    protected function tearDown()
    {
        $this->about = null;
    }

    protected abstract function getContent();
}
