<?php

namespace Joe\Club\Members;

use Joe\Club\ClubContentAbstractScraper;
use Joe\Http\Scraper\ScrapPagesInterface;
use Joe\User;
use simplehtmldom_1_5\simple_html_dom_node;

/**
 * Class ClubMembersScraper
 * @package Joe\Club\Members
 */
class ClubMembersScraper extends ClubContentAbstractScraper implements ScrapPagesInterface
{
    /**
     * @param $pageId
     * @return User[]
     */
    public function scrapPage($pageId)
    {
        $return = [];
        $html = $this->getPage('http://joemonster.org/klub/' . $this->clubId . '/klubowicze/' . $pageId);
        $nodes = $html->find('div.avatar96 a');
        $nodes && $return = array_map(
            function (simple_html_dom_node $node) {
                return new User(trim($node->text()));
            },
            $nodes
        );

        return $return;
    }

    /**
     * @return int
     */
    public function maxItems()
    {
        return 20;
    }
}
