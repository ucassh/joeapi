<?php

namespace Joe\Content\Scraper;

use Joe\Content\ArtFactory;

class ArtScraper extends ContentScraper
{
    public function getSite($id)
    {
        $html = $this->getPage($this::ADDRESS . '/art/' . $id);

        $arts = $html->find('#main-artile');
        $artFactory = new ArtFactory;
        return $artFactory->create([
            'tags' => [],
            'views_on_page' => '',
            'full_description' => '',
            'main_adding_time' => '',
            'main_ok_count' => '',
            'main_not_ok_count' => ''
        ]);

    }
}
