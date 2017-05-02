<?php

namespace Joe\Trolled;

use Joe\Content\Scraper\AbstractScraper;
use Joe\Http\Scraper\ScrapPagesInterface;

class TrolledScraper extends AbstractScraper implements ScrapPagesInterface
{

    public function scrapPage($pageId)
    {
        $html = $this->getPage($this::ADDRESS . '/gadki/' . $pageId);

    }

    public function maxItems()
    {
        return 10;
    }
}
