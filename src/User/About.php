<?php

namespace Joe\User;

use Joe\Connection;
use Joe\Log;
use Joe\User;
use simplehtmldom_1_5\simple_html_dom_node;
use Sunra\PhpSimple\HtmlDomParser;

class About
{
    use ClientTrait;

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->client = $this->user->getClient();
    }

    public function getAllData()
    {

        $res = $this->client->request('GET', Connection::ADDRESS . '/bojownik/' . $this->user->nickName());
        $body = $res->getBody();
        $html = HtmlDomParser::str_get_html($body);

        $profilLeft = $html->find('div.profilLeft');

        if (!isset($profilLeft[0])) {
            throw new \Exception('Object containing informations was not found.');
        }

        $about = $profilLeft[0];
        $innerText = $profilLeft[0]->innertext();

        $content = [];
        $content['hello'] = strip_tags(substr($innerText, 0, strpos($innerText, '<dl>')));

        $dls = $about->find('dl');
        if (isset($dls[0])) {
            $content['Main'] = $this->getPropertiesFromDl($dls[0]);
        }

        $headers = $about->find('h3');
        foreach ($headers as $h) {
            $block = $h->text();
            /** @var $dl simple_html_dom_node */
            $dl = $h->next_sibling();

            if ($dl->tag == 'dl') {
                $content[$block] = $this->getPropertiesFromDl($dl);
            } else {
                Log::info('Exception was found', [$dl->outertext()]);
            }
        }

        $scripts = $about->find('script');
        if (isset($scripts[1])) {
            $content['place'] = str_replace(';', ";\n", $scripts[1]->innertext());
        }

        return $content;
    }


    /**
     * @param $dl
     * @return array
     */
    protected function getPropertiesFromDl($dl)
    {
        $content = [];
        $props = $dl->children();
        foreach ($props as $prop) {
            if ($prop->tag == 'dt') {
                $key = $prop->text();
            } elseif ($prop->tag == 'dd') {
                $content[$key] = $prop->text();
            }
        }
        return $content;
    }
}