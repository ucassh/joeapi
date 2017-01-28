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
    public function Id()
    {
        return $this->id;
    }
}
