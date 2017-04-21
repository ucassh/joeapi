<?php

namespace Joe\Club;

use Joe\Http\Client;
use Joe\Http\GetPageTrait;

class ClubContentAbstractScraper
{
    use GetPageTrait;

    protected $clubId;

    public function __construct($clubId, Client $client)
    {
        $this->clubId = $clubId;
        $this->client = $client;
    }
}
