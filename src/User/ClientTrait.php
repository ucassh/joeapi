<?php

namespace Joe\User;

use Joe\Http\Client;
use Joe\Http\GetPageTrait;
use Joe\Http\PostDataTrait;

trait ClientTrait
{
    use GetPageTrait;
    use PostDataTrait;
    
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
}
