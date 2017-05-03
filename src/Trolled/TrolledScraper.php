<?php

namespace Joe\Trolled;

use Joe\Content\Scraper\AbstractScraper;
use Joe\Http\Scraper\ScrapPagesInterface;
use simplehtmldom_1_5\simple_html_dom_node;

class TrolledScraper extends AbstractScraper implements ScrapPagesInterface
{

    public function scrapPage($pageId)
    {
        $html = $this->getPage($this::ADDRESS . '/gadki/' . $pageId);
        $talks = $html->find('div.singleTalk');
        return array_map([$this, 'extractEntry'], $talks ?: []);
    }

    protected function extractEntry(simple_html_dom_node $node)
    {
        return [];
    }

    public function maxItems()
    {
        return 10;
    }
}
