<?php

namespace Joe\Http;

trait PostDataTrait
{
    /** @var Client $client */
    protected $client;

    public function postData($address, $options = [], ResponseInterpreter $interpreter = null)
    {
        /** @var Response $res */
        $res = $this->client->request('POST', $address, $options);

        if ($interpreter) {
            return $interpreter->process($res);
        }

        return $res;
    }
}