<?php

namespace Joe\Content\Scraper;

use Joe\Connection;
use Joe\Http\Client;
use Joe\User;
use Joe\User\ClientTrait;
use simplehtmldom_1_5\simple_html_dom;

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
        return $node[0] ?: $fullHtml;
    }


}
