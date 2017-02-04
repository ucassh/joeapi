<?php

namespace Joe;

use Joe\Http\Client;
use Joe\User\About;
use simplehtmldom_1_5\simple_html_dom_node;
use Sunra\PhpSimple\HtmlDomParser;

class User
{
    private $nickName;

    /** @var Client $client */
    private $client;

    /** @var  About $about */
    private $about;

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
        $content = $res->getBody();
        $lines = preg_split("/\n/", $content);
        $commentsLine = '';
        foreach ($lines as $line) {
            $line = trim($line);
            if ('comment_js' == substr($line, 0, 10)) {
                $commentsLine = substr($line, 11);
                $commentsLine = trim($commentsLine, " =;");
                break;
            }
        }
        if ($commentsLine == '') {
            throw new \Exception('No comments found. Probably You are not logged in.');
        }

        $comments = json_decode($commentsLine, true);
        $collection = new \ArrayObject;
        foreach ($comments['comments'] as $commentId => &$comment) {
            $commBody = HtmlDomParser::str_get_html($comment['maincomment']['html']);

            $notOkNode = $commBody->find('.commok2 a');
            $notOkCount = isset($notOkNode[0]) ? (int)trim($notOkNode[0]->text()) : 0;
            if (!isset($notOkNode[0])) {
                Log::alert("Node not found - new structure!", [$comment['maincomment']['html']]);
            }
            $message = trim($commBody->find('.commentDesc span')[0]->text());
            $links = $commBody->find('.commentBoxHeader a');

            $comment['maincomment']['link'] = $links[count($links)-1]->href;
            $comment['maincomment']['user'] = $this;
            $comment['maincomment']['notOkCount'] = $notOkCount;
            $comment['maincomment']['html'] = $message;

            $collection->append(CommentFactory::create($comment['maincomment']));
        }

        return $collection;
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
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function nickName()
    {
        return $this->nickName;
    }
}
