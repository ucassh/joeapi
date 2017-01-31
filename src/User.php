<?php

namespace Joe;

use Joe\Http\Client;
use Sunra\PhpSimple\HtmlDomParser;

class User
{
    private $id;

    /** @var Client $client */
    private $client;

    public function __construct($id)
    {
        $this->id = $id;
        $this->client = Connection::client();
    }

    /**
     * @return \ArrayObject
     */
    public function fans()
    {
        $res = $this->client->request('GET', Connection::ADDRESS . '/bojownik/' . $this->id . '/fani');
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
        $res = $this->client->request('GET', Connection::ADDRESS . '/bojownik/' . $this->id . '/komentarze');
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

        $comments = json_decode($commentsLine, true);
        $collection = new \ArrayObject;
        foreach ($comments['comments'] as $commentId => &$comment) {
            $commBody = HtmlDomParser::str_get_html($comment['maincomment']['html']);

            $notOkNode = $commBody->find('.commok2 a');
            $notOkCount = isset($notOkNode[0]) ? (int)trim($notOkNode[0]->text()) : 0;
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
    public function id()
    {
        return $this->id;
    }
}
