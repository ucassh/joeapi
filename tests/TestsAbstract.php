<?php

namespace Tests;

use Joe\Connection;
use Joe\Http\Client;
use Joe\Http\Response;
use Joe\User;

abstract class TestsAbstract extends \PHPUnit_Framework_TestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
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
        $response = is_array($response) ? $response : [$response];
        $client = $this->createMock(Client::class);
        $size = count($response);
        for ($i = 0; $i <= $size - 1; $i++) {
            $client
                ->expects( count($response) == 1 ? $this->any() : $this->at($i))
                ->method('request')
                ->willReturn($response[$i]);
        }
        return $client;
    }

    /**
     * @param $client
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function mockUser($client)
    {
        $user = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->setMethods(['getClient', 'nickName'])
            ->getMock();
        $user
            ->expects($this->any())
            ->method('getClient')
            ->willReturn($client);
        $user
            ->expects($this->any())
            ->method('nickName')
            ->willReturn('taksobietestuje');
        return $user;
    }

    protected function mockConection($login, $pass)
    {
        return $this->getMockBuilder(Connection::class)
            ->disableOriginalConstructor()
            ->setMethods(['getClient', 'nickName'])
            ->getMock();
    }
}
