<?php

namespace Joe\Content\Factory;

use Joe\Content\Scraper\AbstractScraper;

class AboutFactory
{

    public function create(array $params = [])
    {

    }

    public function createFromScraper(AbstractScraper $scraper)
    {
        return $this->create([]);
    }

}
