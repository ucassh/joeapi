<?php

namespace Joe\Content\Scraper;

use Joe\Connection;
use Joe\Http\Client;
use Joe\User;
use Joe\User\ClientTrait;
use simplehtmldom_1_5\simple_html_dom;
use simplehtmldom_1_5\simple_html_dom_node;

class SubscriptionsScraper extends AbstractScraper
{
    use ClientTrait;
    use PrepareableTrait;

    /** @var  User */
    protected $id;

    public function __construct($id, Client $client)
    {
        parent::__construct($id, $client);
        $this->prepare();
    }

    public function getAddress()
    {
        return Connection::ADDRESS . '/bojownik/' . $this->id->nickName() . '/subskrypcje';
    }

    protected function contentHtml(simple_html_dom $fullHtml = null)
    {
        $node = $fullHtml->find('#userProfileContent');
        return $node[0] ?: null;
    }

    public function blogSubscriptions()
    {
        return $this->getUsersFromSection('Subskrybenci bloga', 0);
    }

    /**
     * @param $header
     * @param $index
     * @return mixed
     */
    protected function getUsersFromSection($header, $index)
    {
        $collecion = new \ArrayObject;
        /** @var simple_html_dom_node $node */
        $node = $this->content->find('h2', $index);
        if ($node && $node->text() == $header) {
            /** @var simple_html_dom_node $sibling */
            $sibling = $node->nextSibling();
            foreach ($sibling->childNodes() as $child) {
                if ($child->class == 'avatar') {
                    $collecion->append(new User(trim($child->text())));
                }
            }
        }

        return $collecion;
    }
}
