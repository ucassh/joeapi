<?php

namespace Tests;

use Joe\Http\Client;
use Joe\Http\Response;

abstract class TestsAbstract extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        if (!defined('MAX_FILE_SIZE')) {
            define('MAX_FILE_SIZE', 600000000);
        }
    }


    /**
     * @param string $body
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function mockResponse($body = '')
    {
        $response = $this->createMock(Response::class);
        $response
            ->expects($this->any())
            ->method('getBody')
            ->willReturn($body);
        return $response;
    }

    /**
     * @param $response
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function mockClient($response)
    {
        $client = $this->createMock(Client::class);
        $client
            ->expects($this->any())
            ->method('request')
            ->willReturn($response);
        return $client;
    }
}
