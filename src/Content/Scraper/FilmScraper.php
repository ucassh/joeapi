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
        //yep, there is no place with that value
        return 0;
    }

    public function getAddingTime()
    {
        $node = $this->getElemIfSet('.mtv-video-details span', 1);
        return new \DateTime($node->title);
    }

    public function getOkCount()
    {
        return (int)$this->getElemTxtIfSet('div#glosow');
    }

    public function getCommentsCount()
    {
        $numbers = explode('&nbsp;', $this->getElemTxtIfSet('.art-numbers'));
        return isset($numbers[1]) ? (int)trim($numbers[1]) : 0;
    }

    public function getContent()
    {
        return $this->getElemIfSet('.playerBox iframe');
    }

    public function getNotOkCount()
    {
        return (int)$this->getElemTxtIfSet('#objectNotOkID a');
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
        //another yep... if you're and adult (by settings), you don't have any info of content age restrictions
        return false;
    }

    public function getDescription()
    {
        $title = $this->html->find('mtvDescription');
        return isset($title[0]) ? trim($title[0]->text()) : '';
    }

    public function getCategory()
    {
        return $this->getElemTxtIfSet('.mtv-video-details a', 3);
    }
}
