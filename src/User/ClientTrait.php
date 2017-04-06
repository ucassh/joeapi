<?php

namespace Joe\User;

use Joe\Http\Client;
use Joe\Http\Response;
use Sunra\PhpSimple\HtmlDomParser;

trait ClientTrait
{

    /** @var Client $client */
    protected $client;

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @param string $address
     * @return \simplehtmldom_1_5\simple_html_dom
     * @throws \Exception
     */
    public function getPage($address)
    {
        /** @var Response $res */
        $res = $this->client->request('GET', $address);
        $body = $res->getBody();
        $dom = HtmlDomParser::str_get_html($body);

        if ($dom === false) {
            throw new \Exception('No document found');
        }

        return $dom;
    }
}
