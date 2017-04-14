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

    /**
     * @return \ArrayObject
     */
    public function blogSubscriptions()
    {
        return $this->getUsersFromSection('Subskrybenci bloga', 0);
    }

    /**
     * @return \ArrayObject
     */
    public function wardrobeSubscriptions()
    {
        return $this->getUsersFromSection('Subskrybenci szaffy', 1);
    }

    /**
     * @return \ArrayObject
     */
    public function subscribedBlogs()
    {
        return $this->getUsersFromSection('Subskrybuje bloga', 2);
    }

    /**
     * @return \ArrayObject
     */
    public function subscribedWardrobes()
    {
        return $this->getUsersFromSection('Subskrybuje szaffę', 3);
    }

    /**
     * @param $header
     * @param $index
     * @return \ArrayObject
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
