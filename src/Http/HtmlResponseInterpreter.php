<?php

namespace Joe\Http;

use Sunra\PhpSimple\HtmlDomParser;

class HtmlResponseInterpreter implements ResponseInterpreter
{
    public function process(Response $response)
    {
        $body = $response->getBody();
        $dom = HtmlDomParser::str_get_html($body);

        if ($dom === false) {
            throw new \Exception('No document found');
        }

        return $dom;
    }
}