<?php

namespace Tests;


use Joe\Http\GuzzleResponse;


class GuzzleResponseTest extends \PHPUnit_Framework_TestCase
{

    public function testGuzzleResponse()
    {
        $body = 'body';
        $headers = ['label'=>'value'];
        $statusCode = 200;

        $response = (new GuzzleResponse())
            ->setBody($body)
            ->setHeaders($headers)
            ->setStatusCode($statusCode);

        $this::assertSame($body, $response->getBody());
        $this::assertSame($headers, $response->getHeaders());
        $this::assertSame($statusCode, $response->getStatusCode());
    }
}
