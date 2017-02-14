<?php

namespace Joe\User;

use Joe\Connection;
use Joe\Content\ArtFactory;
use Joe\User;
use simplehtmldom_1_5\simple_html_dom_node;

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
        $html = $this->getPage(Connection::ADDRESS . '/bojownik/' . $this->user->nickName() . '/nadeslane/arty/' . $page);
        $arts = $html->find('.user-item-wrapper');

        $collection = new \ArrayObject();
        foreach ($arts as $node) {
            $params = $this->extractDataFromListingEntry($node);
            $art = ArtFactory::createFromListing($params);
            $collection->append($art);
        }

        return $collection;
    }

    public function artPagesQuantity()
    {
        return $this->contentPagesQuantity(
            Connection::ADDRESS . '/bojownik/' . $this->user->nickName() . '/nadeslane/arty/1'
        );
    }

    public function filmPagesQuantity()
    {
        return $this->contentPagesQuantity(
            Connection::ADDRESS . '/bojownik/' . $this->user->nickName() . '/nadeslane/filmy/1'
        );
    }

    private function contentPagesQuantity($address)
    {
        $html = $this->getPage($address);
        $pages = $html->find('.pagerNav');
        return ($count = count($pages)) > 0
            ? ($value = trim($pages[$count - 1]->text(), '[]')) == '&raquo;'
                ? $pages[$count - 2]->text()
                : $value
            : 0;
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
        $counts = isset($counts[0]) ? array_map('trim', explode('&middot;', $counts[0]->text())) : ['', '', ''];
        return [
            'author' => $this->user,
            'title' => isset($link[0]) ? trim($link[0]->text()) : '',
            'link' => isset($link[0]) ? $link[0]->href : '',
            'id' => (int)substr($beginOfIf, 0, strpos($beginOfIf, '/')),
            'snippet_msg' => isset($description[0]) ? trim($description[0]->text()) : '',
            'thumbnail' => isset($img[0]) ? $img[0]->src : '',
            'time' => isset($addTime[1]) ? trim($addTime[1]->text()) : '',
            'date' => new \DateTime(isset($addTime[1]) ? $addTime[1]->getAttribute('title') : null),
            'ok_count' => (int)$counts[0],
            'views_count' => (int)str_replace([' ','x'], '', $counts[1]),
            'comments_count' => (int)$counts[2]
        ];
    }
}
