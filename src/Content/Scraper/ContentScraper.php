<?php

namespace Joe\Content\Scraper;

use Joe\Http\Client;
use Joe\User\ClientTrait;

abstract class ContentScraper
{
    use ClientTrait;

    const ADDRESS = 'http://joemonster.org';

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public abstract function getSite($id);
}
