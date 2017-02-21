<?php

namespace Joe\Content\Scraper;

use Joe\Content\ArtFactory;
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
        return $artFactory->create([
            'author' => $this->getAuthor(),
            'title' => $this->getTitle(),
            'link' => $this->getAddress(),
            'id' => $this->id,
            'views_count' => $this->getViewsCount(),
            'ok_count' => $this->getOkCount(),
            'comments_count' => $this->getCommentsCount(),
            'tags' => $this->getTags(),
            'content' => $this->getContent(),
            'time' => $this->getAddingTime(),
            'not_ok_count' => $this->getNotOkCount()
        ]);
    }

    public function getAuthor()
    {
        $this->prepareAuthorAndTimeIfNotSet();
        return new User($this->author);
    }

    public function getTitle()
    {
        $title = $this->html->find('.title');
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
        $content = $this->html->find('div#arcik');
        return isset($content[0]) ? $content[0]->innertext() : '';

    }

    public function getNotOkCount()
    {
        $notOkCount = $this->html->find('div#objectNotOkID');
        return isset($notOkCount[0]) ? (int)$notOkCount[0]->text() : 0;

    }

    public function getTags()
    {
        return array_map(function (simple_html_dom_node $val) {
            return $val->text();
        }, $this->html->find('.tag'));
    }

    public function getComments()
    {
        // TODO: Implement getComments() method.
    }

    public function getLikers()
    {
        $collection = new \ArrayObject;
        foreach ($this->html->find('#userContainer>div.userBox') as $div) {
            $collection->append(new User(trim($div->text())));
        }
        return $collection;
    }

    public function getAgeRestrictions()
    {
    }

    public function getAddress()
    {
        return $this::ADDRESS . '/art/' . $this->id;
    }

    protected function contentHtml(simple_html_dom $fullHtml = null)
    {
        $art = $fullHtml->find('#main_article');

        return isset($art[0]) ? $art[0] : null;
    }

    private function prepareCountsIfNotSet()
    {
        if (empty($this->okCount)) {
            $counts = $this->html->find('.art-numbers');
            $counts = isset($counts[0]) ? array_map('trim', explode('&nbsp;', $counts[0]->text())) : ['', '', ''];

            $this->okCount = (int)$counts[1];
            $this->viewsCount = (int)str_replace(' ', '', $counts[0]);
            $this->commentsCount = (int)$counts[12];
        }
    }

    private function prepareAuthorAndTimeIfNotSet()
    {
        $authorDate = $this->html->find('.art-author-date');
        $authorDate = isset($authorDate[0]) ? array_map('trim', explode('&middot;', $authorDate[0]->text())) : ['', ''];
        $this->author = $authorDate[0];

        $date = explode(' ', $authorDate[1]);
        $this->time = isset($date[0])
            ? new \DateTime($date[2] . '-' . TimeHelper::monthNameToNumber($date[1]) . '-' . $date[0] . ' ' . $date[3])
            : null;
    }
}
