<?php

namespace Joe\Content\Scraper;

use Joe\Http\Client;
use Joe\User\ClientTrait;

abstract class ContentScraper
{
    use ClientTrait;

    const ADDRESS = 'http://joemonster.org';
    protected $id;

    public function __construct($id, Client $client) {
        $this->id = $id;
        $this->client = $client;
    }

    public abstract function getSite();
    public abstract function getAuthor();
    public abstract function getLink();
    public abstract function getId();
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
}
