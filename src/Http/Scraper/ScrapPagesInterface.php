<?php

namespace Joe\Http\Scraper;

interface ScrapPagesInterface
{
    public function scrapPage($pageId);

    /** @return int */
    public function maxItems();
}
