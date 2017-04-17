<?php

namespace Joe\Club;

use Joe\Connection;
use Joe\Content\Scraper\AbstractScraper;
use Joe\Content\Scraper\PrepareableTrait;
use simplehtmldom_1_5\simple_html_dom;

class ClubScraper extends AbstractScraper
{
    use PrepareableTrait;

    public function getAddress()
    {
        return Connection::ADDRESS . '/klub/' . $this->id . 'strona/1';
    }

    protected function contentHtml(simple_html_dom $fullHtml = null)
    {
        return $fullHtml->find('#main', 0);
    }

}
