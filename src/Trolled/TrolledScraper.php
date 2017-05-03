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
        $description = $node->find('.talkDescription', 0)->text();
        $astPos = strrpos($description, '*');
        return [
            'author' => substr($description, 12, ($astPos - 13)),
            'date' => substr($description, $astPos + 9, 10)
        ];
    }

    public function maxItems()
    {
        return 10;
    }
}
