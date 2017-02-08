<?php

namespace Joe\User;

use Joe\Connection;
use Joe\Content\ArtFactory;
use Joe\Http\Response;
use Joe\User;
use simplehtmldom_1_5\simple_html_dom_node;
use Sunra\PhpSimple\HtmlDomParser;

class SendedContent
{
    use ClientTrait;

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->client = $this->user->getClient();
    }

    public function getArticlesPage($page = 1)
    {
        /** @var Response $res */
        $res = $this->client->request(
            'GET',
            Connection::ADDRESS . '/bojownik/' . $this->user->nickName() . '/nadeslane/arty/' . $page
        );
        $body = $res->getBody();
        $html = HtmlDomParser::str_get_html($body);
        $arts = $html->find('.user-item-wrapper');

        $collection = new \ArrayObject();
        foreach ($arts as $node) {
            $params = $this->extractDataFromListingEntry($node);
            $art = ArtFactory::createFromListing($params);
            $collection->append($art);
        }

        return $collection;
    }

    /**
     * TODO to be refactored and added conditions in case of !isset
     * @param simple_html_dom_node $node
     * @return array
     */
    protected function extractDataFromListingEntry(simple_html_dom_node $node)
    {
        $link = $node->find('a.itemTitle');
        $params = [];
        $params['author'] = $this->user;
        $params['title'] = trim($link[0]->text());
        $params['link'] = $link[0]->href;
        $beginOfIf = substr($params['link'], 5);
        $params['id'] = substr($beginOfIf, 0, strpos($beginOfIf, '/'));
        $description = $node->find('.user-item-description');
        $params['snippet_msg'] = trim($description[0]->text());
        $img = $node->find('img.itemBigThumb');
        $params['thumbnail'] = $img[0]->src;
        $addTime = $node->find('div.small span');
        $params['time'] = trim($addTime[1]->text());
        $params['date'] = new \DateTime($addTime[1]->getAttribute('title'));
        $counts = $node->find('div.small b');

        $counts = array_map('trim', explode('&middot;',$counts[0]->text()));
        $params['ok_count'] = $counts[0];
        $params['views_count'] = $counts[1];
        $params['comments_count'] = $counts[2];
        return $params;
    }

}
