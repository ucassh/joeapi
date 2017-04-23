<?php

namespace Joe\Club\Forum;

use Joe\Club\ClubContentAbstractScraper;
use Joe\Connection;
use Joe\Http\Scraper\ScrapPagesInterface;
use simplehtmldom_1_5\simple_html_dom_node;

/**
 * Class ClubForumScraper
 * @package Joe\Club\Forum
 */
class ClubForumScraper extends ClubContentAbstractScraper implements ScrapPagesInterface
{
    /**
     * @param $pageId
     * @return ClubForumThreadEntity[]
     */
    public function scrapPage($pageId)
    {
        $return = [];
        $html = $this->getPage('http://joemonster.org/klub/' . $this->clubId . '/forum/strona/' . $pageId);
        $nodes = $html->find('tr.klub_tr1,tr.klub_tr2');
        $factory = new ClubForumThreadFactory();
        $nodes && $return = array_map(
            function (simple_html_dom_node $thread) use ($factory) {
                /** @var simple_html_dom_node[] $cells */
                $cells = $thread->find('td');
                return $factory->create([
                    'url' => Connection::ADDRESS . $cells[0]->childNodes(0)->href,
                    'created' => trim($cells[2]->find('span', 0)->text()),
                    'title' => trim($cells[0]->text()),
                    'username' => trim($cells[2]->find('a', 0)->text()),
                    'last_commented' => ($span = $cells[3]->find('span', 0)) ? trim($span->text()) : '',
                    'last_commented_by' => ($a = $cells[3]->find('a', 0)) ? trim($a->text()) : '',
                    'snippet' => $cells[0]->childNodes(0)->title,
                ]);
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
        return 30;
    }
}