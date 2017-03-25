<?php

namespace Joe\Content\Factory;

use Joe\Content\Scraper\ContentScraper;

class FilmFactory extends ContentFactory
{
    public function __construct()
    {
        $this->clazz = 'Film';
    }

    public function create(array $params = [])
    {
        return parent::create($params)
            ->setCategory(isset($params['category']) ? $params['category'] : null);
    }

    public function createFromScraper(ContentScraper $scraper)
    {
        return parent::createFromScraper($scraper)
            ->setCategory($scraper->getCategory());
    }


}
