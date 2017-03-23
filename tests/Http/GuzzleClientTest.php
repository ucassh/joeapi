<?php

namespace Tests;


use GuzzleHttp\Psr7\Response;
use Joe\Http\GuzzleClient;
use Mockery as m;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class GuzzleClientTest extends \PHPUnit_Framework_TestCase
{

    public function testRequest()
    {
        $body = '<body></body>';
        $headers = ['label'=>'value'];
        $statusCode = 200;

        $response = $this->createMock(Response::class);
        $response->expects($this->any())
            ->method('getBody')
            ->willReturn($body);

        $response->expects($this->any())
            ->method('getHeaders')
            ->willReturn($headers);

        $response->expects($this->any())
            ->method('getStatusCode')
            ->willReturn($statusCode);


        $externalMock = m::mock('overload:GuzzleHttp\Client');
        $externalMock->shouldReceive('request')
            ->once()
            ->andReturn($response);

        $gclient = new GuzzleClient();
        $gResponse = $gclient->request('Get', 'http://fake.url');

        $this::assertEquals($body, $gResponse->getBody());
        $this::assertEquals($headers, $gResponse->getHeaders());
        $this::assertEquals($statusCode, $gResponse->getStatusCode());

    }
}
