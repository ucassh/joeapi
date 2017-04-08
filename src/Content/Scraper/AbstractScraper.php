<?php

namespace Joe\Content\Scraper;

use Joe\Http\Client;
use Joe\User\ClientTrait;

abstract class AbstractScraper
{
    use ClientTrait;

    const ADDRESS = 'http://joemonster.org';
    protected $id;

    public function __construct($id, Client $client)
    {
        $this->id = $id;
        $this->client = $client;
    }
}
