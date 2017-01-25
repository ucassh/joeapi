<?php

namespace Joe\Http;

use GuzzleHttp\Client;

class GuzzleClient implements \Joe\Http\Client
{
    private $client;

    public function __construct(array $options = [])
    {
        $this->client = new Client(['cookies' => true]);
    }

    public function request($method, $url, array $options = [])
    {
        $options = array_merge(
            [
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) ' .
                        'AppleWebKit/537.36 (KHTML, like Gecko) ' .
                        'Chrome/54.0.2840.59 Safari/537.36',
                    'Referer' => 'http://joemonster.org/logowanie',
                    'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                    'Accept-Encoding' => 'gzip, deflate',
                    'Accept-Language' => 'pl-PL,pl;q=0.8,en-US;q=0.6,en;q=0.4',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ]
            ],
            $options
        );

        $res = $this->client->request($method, $url, $options);

        $response = new GuzzleResponse;
        return $response
            ->setBody($res->getBody())
            ->setHeaders($res->getHeaders())
            ->setStatusCode($res->getStatusCode());
    }
}