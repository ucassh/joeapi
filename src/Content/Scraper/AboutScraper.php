<?php

namespace Joe\Content\Scraper;

use Joe\Connection;
use Joe\User;
use Joe\User\ClientTrait;
use simplehtmldom_1_5\simple_html_dom;
use simplehtmldom_1_5\simple_html_dom_node;

class AboutScraper extends AbstractScraper
{
    use ClientTrait;
    use PrepareableTrait;

    /** @var  User */
    protected $id;

    public function getAddress()
    {
        return Connection::ADDRESS . '/bojownik/' . $this->id->nickName();
    }

    protected function contentHtml(simple_html_dom $fullHtml = null)
    {
        /** @var $profilLeft simple_html_dom_node[] */
        $profilLeft = $fullHtml->find('div.profilLeft');

        if (!isset($profilLeft[0])) {
            throw new \Exception('Object containing informations was not found.');
        }

        return isset($profilLeft[0]) ? $profilLeft[0] : null;
    }

    public function getAllData()
    {
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
     * @return mixed
     */
    public function getHelloMessage()
    {
        $innerText = $this->content->innertext();
        return trim(strip_tags(substr($innerText, 0, strpos($innerText, '<dl>'))));
    }

    /**
     * @return array
     */
    public function getBasicInfo()
    {
        $dls = $this->content->find('dl');
        if (isset($dls[0])) {
            return $this->getPropertiesFromDl($dls[0]);
        }
        return [];
    }

    /**
     * @return mixed
     */
    public function getCategorisedInfo()
    {
        $content = [];
        $headers = $this->content->find('h3');
        foreach ($headers as $h) {
            $block = $h->text();
            /** @var $dl simple_html_dom_node */
            $dl = $h->next_sibling();

            if ($dl->tag == 'dl') {
                $content[$block] = $this->getPropertiesFromDl($dl);
            } else {
                //throw new \Exception('Exception was found' . print_r($dl->outertext(), true));
            }
        }
        return $content;
    }

    /**
     * @return mixed
     */
    public function getLocalization()
    {
        $scripts = $this->content->find('script');
        if (isset($scripts[1])) {
            $matches = [];
            preg_match_all('/point\.l(?:ong|at) = ([0-9]+\.[0-9]+);/', $scripts[1], $matches);
            return $matches[1];
        }
        return [];
    }

    public function getId()
    {
        $id = $this->html->find('#elementid');
        return $id[0]->value;
    }

}