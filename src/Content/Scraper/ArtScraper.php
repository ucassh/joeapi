<?php

namespace Joe\Content\Scraper;

use Joe\Content\Factory\ArtFactory;
use Joe\Helper\CommentsHelper;
use Joe\Helper\TimeHelper;
use Joe\User;
use simplehtmldom_1_5\simple_html_dom;
use simplehtmldom_1_5\simple_html_dom_node;

class ArtScraper extends ContentScraper
{
    private $okCount;
    private $viewsCount;
    private $commentsCount;
    private $time;
    private $author;

    public function getSite()
    {
        $artFactory = new ArtFactory;
        return $artFactory->createFromScraper($this);
    }

    public function getAuthor()
    {
        $this->prepareAuthorAndTimeIfNotSet();
        return new User($this->author);
    }

    public function getTitle()
    {
        $title = $this->content->find('.title');
        return isset($title[0]) ? trim($title[0]->text()) : '';
    }

    public function getViewsCount()
    {
        $this->prepareCountsIfNotSet();
        return $this->viewsCount;
    }

    public function getAddingTime()
    {
        $this->prepareAuthorAndTimeIfNotSet();
        return $this->time;
    }

    public function getOkCount()
    {
        $this->prepareCountsIfNotSet();
        return $this->okCount;
    }

    public function getCommentsCount()
    {
        $this->prepareCountsIfNotSet();
        return $this->commentsCount;
    }

    public function getContent()
    {
        $content = $this->content->find('div#arcik');
        return isset($content[0]) ? $content[0]->innertext() : '';

    }

    public function getNotOkCount()
    {
        $notOkCount = $this->content->find('div#objectNotOkID');
        return isset($notOkCount[0]) ? (int)$notOkCount[0]->text() : 0;

    }

    public function getTags()
    {
        return array_map(function (simple_html_dom_node $val) {
            return $val->text();
        }, $this->content->find('.tag'));
    }

    public function getComments()
    {
        $scripts = implode(PHP_EOL, array_map(function (simple_html_dom_node $val) {
            return str_replace("\t", PHP_EOL, $val->innertext());
        }, $this->content->find('script')));

        return (new CommentsHelper)->extractComments($scripts);
    }

    public function getLikers()
    {
        $collection = new \ArrayObject;
        $html = $this->getPage(self::ADDRESS . '/who.php?sid=' . $this->getId() . '&op=favourited-articles');
        foreach ($html->find('div.userBox') as $div) {
            $collection->append(new User(trim($div->text())));
        }
        return $collection;
    }

    public function getAgeRestrictions()
    {
        return count($this->content->find('.sprite-for_adults')) > 0;
    }

    public function getAddress()
    {
        return $this::ADDRESS . '/art/' . $this->id;
    }

    public function getDescription()
    {
        $content = $this->content->find('div#arcik strong');
        return isset($content[0]) ? trim($content[0]->text()) : '';
    }

    protected function contentHtml(simple_html_dom $fullHtml = null)
    {
        $art = $fullHtml->find('#main_article');

        return isset($art[0]) ? $art[0] : null;
    }

    private function prepareCountsIfNotSet()
    {
        if (empty($this->okCount)) {
            $counts = $this->content->find('.art-numbers');
            $counts = isset($counts[0]) ? array_map('trim', explode('&nbsp;', $counts[0]->text())) : ['', '', ''];

            $this->okCount = (int)$counts[1];
            $this->viewsCount = (int)str_replace(' ', '', $counts[0]);
            $this->commentsCount = (int)$counts[2];
        }
    }

    private function prepareAuthorAndTimeIfNotSet()
    {
        $authorDate = $this->content->find('.art-author-date');
        $authorDate = isset($authorDate[0]) ? array_map('trim', explode('&middot;', $authorDate[0]->text())) : ['', ''];
        $this->author = $authorDate[0];

        $date = explode(' ', $authorDate[1]);
        $this->time = isset($date[1])
            ? new \DateTime($date[2] . '-' . TimeHelper::monthNameToNumber($date[1]) . '-' . $date[0] . ' ' . $date[3])
            : null;
    }
}
