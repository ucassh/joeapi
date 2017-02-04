<?php

namespace Joe\User;

use Joe\Http\Client;

trait ClientTrait
{

    /** @var Client $client */
    private $client;

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
}