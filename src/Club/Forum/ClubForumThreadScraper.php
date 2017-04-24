<?php

namespace Joe\Club\Forum;

use Joe\Club\ClubContentAbstractScraper;
use Joe\Http\Client;
use Joe\Http\Scraper\ScrapPagesInterface;
use simplehtmldom_1_5\simple_html_dom_node;

/**
 * Class ClubForumScraper
 * @package Joe\Club\Forum
 */
class ClubForumThreadScraper extends ClubContentAbstractScraper implements ScrapPagesInterface
{
    private $threadId;

    public function __construct($clubId, Client $client, $threadId)
    {
        $this->threadId = $threadId;
        parent::__construct($clubId, $client);
    }


    /**
     * @param $pageId
     * @return ClubForumPostEntity[]
     */
    public function scrapPage($pageId)
    {
        $return = [];
        $address = 'http://joemonster.org/klub/' . $this->clubId . '/forum/' . $this->threadId . '/strona/' . $pageId;
        $html = $this->getPage($address);
        $nodes = $html->find('div.postBox');
        $factory = new ClubForumPostFactory();
        $nodes && $return = array_map(
            function (simple_html_dom_node $thread) use ($factory) {
                $dateIn = trim($thread->find('div.postHeader', 0)->text());
                return $factory->create([
                    'created' => substr($dateIn, strlen($dateIn)-19),
                    'properties' => array_map(
                        function (simple_html_dom_node $node) {
                            return trim($node->text());
                        },
                        $thread->find('div.postHeader', 0)->childNodes()
                    ),
                    'username' => trim($thread->find('a', 0)->text()),
                    'message' => trim($thread->find('div.postContent', 0)->text()),
                    'edits' =>($a = $thread->find('div.postContent div.tiny.grey', 0)) ? trim($a->text()) : '',
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