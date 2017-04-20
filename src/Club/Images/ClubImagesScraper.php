<?php

namespace Joe\Club\Images;

use Joe\Club\ClubContentAbstractScraper;
use Joe\Http\Scraper\ScrapPagesInterface;
use simplehtmldom_1_5\simple_html_dom_node;

/**
 * Class ClubImagesScraper
 * @package Joe\Club\Images
 */
class ClubImagesScraper extends ClubContentAbstractScraper implements ScrapPagesInterface
{
    /**
     * @param $pageId
     * @return ClubImageEntity[]
     */
    public function scrapPage($pageId)
    {
        $return = [];
        $html = $this->getPage('http://joemonster.org/klub/' . $this->clubId . '/galeria/strona/' . $pageId);
        $nodes = $html->find('div.teamMain div[align=center]');
        $factory = new ClubImageFactory();
        $nodes && $return = array_map(
            function (simple_html_dom_node $node) use ($factory) {
                /** @var simple_html_dom_node $authorDiv */
                $authorDiv = $node->nextSibling()->nextSibling();
                $img = $node->find('a>img', 0);
                return $factory->create([
                    'img_url' => $img->src,
                    'img_site' => $img->parent()->href,
                    'username' => trim($authorDiv->find('a', 0)->text())
                ]);
            },
            $nodes
        );

        return $return;
    }
}
