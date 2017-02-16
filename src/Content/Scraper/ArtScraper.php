<?php

namespace Joe\Content\Scraper;

class ArtScraper extends ContentScraper
{
    public function getSite($id)
    {
        $page = $this->getPage($this::ADDRESS . '/art/' . $id);


    }
}