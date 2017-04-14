<?php

namespace Joe;

use Joe\Content\Factory\AboutFactory;
use Joe\Content\Factory\SubscriptionsContainerFactory;
use Joe\Content\Scraper\AboutScraper;
use Joe\Content\Scraper\FansScraper;
use Joe\Content\Scraper\SubscriptionsScraper;
use Joe\Helper\CommentsHelper;
use Joe\User\About;
use Joe\User\ClientTrait;
use Joe\User\SendedContent;
use Joe\User\SubscriptionsContainer;

class User
{

    use ClientTrait;
    private $nickName;

    /** @var SubscriptionsContainer */
    private $subscriptions;

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

    /**
     * @return About
     */
    public function about()
    {
        if (is_null($this->about)) {
            $this->about = (new AboutFactory())->createFromScraper(new AboutScraper($this, $this->client));
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

    public function fanOf($page = 1)
    {
        return (new FansScraper($this, $this->client))->fanOf($page);
    }

    public function clubs()
    {

    }

    public function blog()
    {

    }

    /**
     * @return SubscriptionsContainer
     */
    public function subscriptions()
    {
        if (!$this->subscriptions) {
            $this->subscriptions = (new SubscriptionsContainerFactory())
                ->createFromScraper(new SubscriptionsScraper($this, $this->client));
        }
        return $this->subscriptions;
    }

    /**
     * @return mixed
     */
    public function nickName()
    {
        return $this->nickName;
    }
}
