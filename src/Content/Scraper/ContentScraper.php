<?php

namespace Joe\Content\Scraper;

use Joe\Http\Client;
use simplehtmldom_1_5\simple_html_dom_node;

abstract class ContentScraper extends AbstractScraper
{
    use PrepareableTrait;

    public function __construct($id, Client $client)
    {
        parent::__construct($id, $client);
        $this->prepare();
    }

    /**
     * @param $selector
     * @param $index
     * @return simple_html_dom_node|string
     */
    protected function getElemTxtIfSet($selector, $index = 0)
    {
        $node = $this->getElemIfSet($selector, $index);
        return isset($node) ? trim($node->text()) : '';
    }

    /**
     * @param $selector
     * @param int $index
     * @return null|simple_html_dom_node
     */
    protected function getElemIfSet($selector, $index = 0)
    {
        $nodes = $this->html->find($selector);
        return isset($nodes[$index]) ? $nodes[$index] : null;
    }

    abstract public function getSite();

    abstract public function getAuthor();

    abstract public function getTitle();

    abstract public function getViewsCount();

    abstract public function getAddingTime();

    abstract public function getOkCount();

    abstract public function getCommentsCount();

    abstract public function getContent();

    abstract public function getNotOkCount();

    abstract public function getTags();

    abstract public function getComments();

    abstract public function getLikers();

    abstract public function getAgeRestrictions();

    abstract public function getDescription();

    public function getId()
    {
        return $this->id;
    }
}
