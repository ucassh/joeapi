<?php

namespace Joe\Content\Scraper;

use Joe\User\ClientTrait;

abstract class ContentScraper
{
    use ClientTrait;

    const ADDRESS = 'http://joemonster.org';


    public abstract function getSite($id);
}
