<?php

namespace Joe\Content\Scraper;

use Joe\Content\FilmFactory;
use Joe\Helper\CommentsHelper;
use Joe\User;
use simplehtmldom_1_5\simple_html_dom;
use simplehtmldom_1_5\simple_html_dom_node;

class FilmScraper extends ContentScraper
{
    public function getSite()
    {
        $artFactory = new FilmFactory;
        return $artFactory->createFromScraper($this);
    }

    protected function contentHtml(simple_html_dom $fullHtml = null)
    {
        $film = $fullHtml->find('#main');
        return isset($film[0]) ? $film[0] : null;
    }

    public function getAuthor()
    {
        $username = $this->getElemTxtIfSet('.mtv-video-details a');
        return new User($username);
    }

    public function getAddress()
    {
        return $this::ADDRESS . '/filmy/' . $this->id;
    }

    public function getTitle()
    {
        return $this->getElemTxtIfSet('h1.playerTitle b.title');
    }

    public function getViewsCount()
    {
        // TODO: Implement getViewsCount() method.
    }

    public function getAddingTime()
    {
        // TODO: Implement getAddingTime() method.
    }

    public function getOkCount()
    {
        // TODO: Implement getOkCount() method.
    }

    public function getCommentsCount()
    {
        // TODO: Implement getCommentsCount() method.
    }

    public function getContent()
    {
        // TODO: Implement getContent() method.
    }

    public function getNotOkCount()
    {
        // TODO: Implement getNotOkCount() method.
    }

    public function getTags()
    {
        return array_map(function (simple_html_dom_node $val) {
            return $val->text();
        }, $this->html->find('span.tags a'));
    }

    public function getComments()
    {
        $scripts = implode(PHP_EOL, array_map(function (simple_html_dom_node $val) {
            return str_replace("\t", PHP_EOL, $val->innertext());
        }, $this->html->find('script')));

        return CommentsHelper::extractComments($scripts);
    }

    public function getLikers()
    {
        $collection = new \ArrayObject;
        $html = $this->getPage(self::ADDRESS . '/who.php?sid=' . $this->getId() . '&op=favourited-movies');
        foreach ($html->find('div.userBox') as $div) {
            $collection->append(new User(trim($div->text())));
        }
        return $collection;
    }

    public function getAgeRestrictions()
    {
        // TODO: Implement getAgeRestrictions() method.
    }

    public function getDescription()
    {
        $title = $this->html->find('mtvDescription');
        return isset($title[0]) ? trim($title[0]->text()) : '';
    }
}
