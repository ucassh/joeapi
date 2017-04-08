<?php

namespace Joe\Content\Scraper;

use Joe\Connection;
use Joe\Fan;
use Joe\User;
use Joe\User\ClientTrait;

class FansScraper extends AbstractScraper
{
    use ClientTrait;

    /** @var  User */
    protected $id;

    public function fans()
    {
        $html = $this->getPage(Connection::ADDRESS . '/bojownik/' . $this->id->nickName() . '/fani');

        $collection = new \ArrayObject;
        foreach ($html->find('.avatar') as $element) {
            $link = $element->firstChild()->href;
            $id = substr($link, strrpos($link, '/') + 1);

            $div = $element->find('div');
            $since = $div[0]->title;
            $since = new \DateTime($since);

            $fan = new Fan($id, $this->id, $since);

            $collection->append($fan);
        }

        return $collection;
    }
}
