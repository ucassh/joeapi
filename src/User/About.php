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

    /** @var $profilLeft simple_html_dom_node[] */
    private $about;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->client = $this->user->getClient();
    }

    public function getAllData()
    {
        $this->prepareAboutDOM();

        $content = [];
        $content['hello'] = $this->getHelloMessage();
        $content['Basic'] = $this->getBasicInfo();
        $content = array_merge($content, $this->getCategorisedInfo());
        $content['place'] = $this->getLocalization();

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

    /**
     * @throws \Exception
     */
    protected function prepareAboutDOM()
    {
        if (empty($this->about)) {
            $res = $this->client->request('GET', Connection::ADDRESS . '/bojownik/' . $this->user->nickName());
            $body = $res->getBody();
            $html = HtmlDomParser::str_get_html($body);

            /** @var $profilLeft simple_html_dom_node[] */
            $profilLeft = $html->find('div.profilLeft');

            if (!isset($profilLeft[0])) {
                throw new \Exception('Object containing informations was not found.');
            }

            $this->about = $profilLeft[0];
        }
    }

    /**
     * @return mixed
     */
    public function getHelloMessage()
    {
        $this->prepareAboutDOM();
        $innerText = $this->about->innertext();
        return strip_tags(substr($innerText, 0, strpos($innerText, '<dl>')));
    }

    /**
     * @return mixed
     */
    public function getBasicInfo()
    {
        $this->prepareAboutDOM();
        $dls = $this->about->find('dl');
        if (isset($dls[0])) {
            return $this->getPropertiesFromDl($dls[0]);
        }
        return '';
    }

    /**
     * @return mixed
     */
    public function getCategorisedInfo()
    {
        $content = [];
        $headers = $this->about->find('h3');
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
        return $content;
    }

    /**
     * @return mixed
     */
    public function getLocalization()
    {
        $scripts = $this->about->find('script');
        if (isset($scripts[1])) {
            return  str_replace(';', ";\n", $scripts[1]->innertext());
        }
        return '';
    }
}