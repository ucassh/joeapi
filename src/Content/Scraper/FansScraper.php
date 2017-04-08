<?php

namespace Joe\Content\Scraper;

use Joe\Connection;
use Joe\Fan;
use Joe\Http\HtmlResponseInterpreter;
use Joe\User;
use Joe\User\ClientTrait;
use simplehtmldom_1_5\simple_html_dom;

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

    public function fanOf($page = 1)
    {
        /** @var simple_html_dom $html */
        $html = $this->postData(
            'http://joemonster.org/ajax.php',
            [
                'headers' => [
                    'X-Requested-With' => 'XMLHttpRequest'
                ],
                'form_params' => [
                    'op' => 'showFav',
                    'type' => 'user',
                    'small' => 'false',
                    'userid' => $this->id->about()->getId(),
                    'pageID' => $page
                ]
            ],
            new HtmlResponseInterpreter
        );
        $collection = new \ArrayObject;
        foreach ($html->find('span') as $item) {
            $collection->append(new User(trim($item->text())));
        }

        return $collection;
    }

}
