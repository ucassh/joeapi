<?php

namespace Joe;

use Joe\Helper\CommentsHelper;
use Joe\User\About;
use Joe\User\ClientTrait;
use Joe\User\SendedContent;
use Sunra\PhpSimple\HtmlDomParser;

class User
{

    use ClientTrait;
    private $nickName;

    /** @var  About $about */
    private $about;

    /** @var  SendedContent $sended */
    private $sended;

    public function __construct($nickName)
    {
        $this->nickName = $nickName;
        $this->client = Connection::client();
    }

    /**
     * @return \ArrayObject
     */
    public function fans()
    {
        $res = $this->client->request('GET', Connection::ADDRESS . '/bojownik/' . $this->nickName . '/fani');
        $body = $res->getBody();
        $html = HtmlDomParser::str_get_html($body);

        $collection = new \ArrayObject();
        foreach ($html->find('.avatar') as $element) {
            $link = $element->firstChild()->href;
            $id = substr($link, strrpos($link, '/') +1);

            $div = $element->find('div');
            $since = $div[0]->title;
            $since = new \DateTime($since);

            $fan = new Fan($id, $this, $since);

            $collection->append($fan);
        }

        return $collection;
    }

    public function comments()
    {
        $res = $this->client->request('GET', Connection::ADDRESS . '/bojownik/' . $this->nickName . '/komentarze');
        return (new CommentsHelper)->extractComments($res->getBody());
    }

    public function about()
    {
        if (is_null($this->about)) {
            $this->about = new About($this);
        }
        return $this->about;
    }

    public function sended()
    {
        if (is_null($this->sended)) {
            $this->sended = new SendedContent($this);
        }
        return $this->sended;
    }

    public function wardrobe()
    {

    }

    public function fanOf()
    {

    }

    public function clubs()
    {

    }

    public function blog()
    {

    }

    public function subscriptions()
    {

    }

    /**
     * @return mixed
     */
    public function nickName()
    {
        return $this->nickName;
    }
}
