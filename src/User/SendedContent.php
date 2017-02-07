<?php

namespace Joe\User;

use Joe\Connection;
use Joe\Content\Art;
use Joe\Http\Response;
use Joe\User;
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
            $link = $node->find('a.itemTitle');
            $title = trim($link[0]->text());
            $href = $link[0]->href;
            $beginOfIf = substr($href, 5);
            $id = substr($beginOfIf, 0, strpos($beginOfIf, '/'));
            $art = new Art($id);

            $collection->append($art);
        }

        return $collection;
    }
    
}
