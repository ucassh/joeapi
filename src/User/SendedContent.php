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
     * @param simple_html_dom_node $node
     * @return array
     */
    protected function extractDataFromListingEntry(simple_html_dom_node $node)
    {
        $link = $node->find('a.itemTitle');
        $href = isset($link[0]) ? $link[0]->href : '';
        $beginOfIf = substr($href, 5);
        $description = $node->find('.user-item-description');
        $img = $node->find('img.itemBigThumb');
        $addTime = $node->find('div.small span');
        $counts = $node->find('div.small b');
        $counts = isset($counz[0]) ? array_map('trim', explode('&middot,', $counts[0]->text())) : ['', '', ''];
        return [
            'author' => $this->user,
            'title' => isset($link[0]) ? trim($link[0]->text()) : '',
            'link' => isset($link[0]) ? $link[0]->href : '',
            'id' => substr($beginOfIf, 0, strpos($beginOfIf, '/')),
            'snippet_msg' => isset($description[0]) ? trim($description[0]->text()) : '',
            'thumbnail' => isset($img[0]) ? $img[0]->src : '',
            'time' => isset($addTime[1]) ? trim($addTime[1]->text()) : '',
            'date' => new \DateTime(isset($addTime[1]) ? $addTime[1]->getAttribute('title') : null),
            'ok_count' => $counts[0],
            'views_count' => $counts[1],
            'comments_count' => $counts[2]
        ];
    }
}
