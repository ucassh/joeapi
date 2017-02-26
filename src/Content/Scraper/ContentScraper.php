<?php

namespace Joe\Content\Scraper;

use Joe\Http\Client;
use Joe\User\ClientTrait;
use simplehtmldom_1_5\simple_html_dom;
use simplehtmldom_1_5\simple_html_dom_node;

abstract class ContentScraper
{
    use ClientTrait;

    const ADDRESS = 'http://joemonster.org';
    protected $id;

    /** @var simple_html_dom_node $html */
    protected $html;

    public function __construct($id, Client $client) {
        $this->id = $id;
        $this->client = $client;

        $this->prepare();
    }

    protected function prepare()
    {
        $html = $this->getPage($this->getAddress());

        $art = $this->contentHtml($html);

        if (empty($art)) {
            throw new \Exception('Content not found');
        }

        $this->html = $art;
    }


    /**
     * @param $selector
     * @param $index
     * @return simple_html_dom_node|string
     */
    protected function getElemTxtIfSet($selector, $index = 0){
        $node = $this->getElemIfSet($selector, $index);
        return isset($node) ? trim($node->text()) : '';
    }

    /**
     * @param $selector
     * @param int $index
     * @return null|simple_html_dom_node
     */
    protected function getElemIfSet($selector, $index = 0){
        $nodes = $this->html->find($selector);
        return isset($nodes[$index]) ? $nodes[$index] : null;
    }

    protected abstract function contentHtml(simple_html_dom $fullHtml = null);
    public abstract function getSite();

    public abstract function getAuthor();
    public abstract function getAddress();
    public abstract function getTitle();
    public abstract function getViewsCount();
    public abstract function getAddingTime();
    public abstract function getOkCount();
    public abstract function getCommentsCount();
    public abstract function getContent();
    public abstract function getNotOkCount();
    public abstract function getTags();
    public abstract function getComments();
    public abstract function getLikers();
    public abstract function getAgeRestrictions();
    public abstract function getDescription();

    public function getId()
    {
        return $this->id;
    }
}
