<?php

namespace Joe;

use Joe\Content\Scraper\FansScraper;
use Joe\Helper\CommentsHelper;
use Joe\User\About;
use Joe\User\ClientTrait;
use Joe\User\SendedContent;

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
        return (new FansScraper($this, $this->client))->fans();
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
        return (new FansScraper($this, $this->client))->fanOf();
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
