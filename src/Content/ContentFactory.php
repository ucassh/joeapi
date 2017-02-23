<?php

namespace Joe\Content;

use Joe\Content\Scraper\ContentScraper;

abstract class ContentFactory
{
    protected $clazz;
    /**
     * @param array $params
     * @return Content
     */
    public function create(array $params = [])
    {
        $cls = 'Joe\Content\\'.$this->clazz;
        /** @var Content $content */
        $content = new $cls(isset($params['id']) ? $params['id'] : null);
        return $content->setAddingTime(isset($params['time']) ? $params['time'] : null)
            ->setAuthor(isset($params['author']) ? $params['author'] : null)
            ->setLink(isset($params['link']) ? $params['link'] : null)
            ->setCommentsCount(isset($params['comments_count']) ? $params['comments_count'] : null)
            ->setContent(isset($params['content']) ? $params['content'] : null)
            ->setTitle(isset($params['title']) ? $params['title'] : null)
            ->setOkCount(isset($params['ok_count']) ? $params['ok_count'] : null)
            ->setNotOkCount(isset($params['not_ok_count']) ? $params['not_ok_count'] : null)
            ->setViewsCount(isset($params['views_count']) ? $params['views_count'] : null)
            ->setAgeRestrictions(isset($params['age_restrictions']) ? $params['age_restrictions'] : null)
            ->setComments(isset($params['comments']) ? $params['comments'] : null)
            ->setLikers(isset($params['likers']) ? $params['likers'] : null);
    }

    public function createFromScraper(ContentScraper $scraper)
    {
        return $this->create([
            'author' => $scraper->getAuthor(),
            'title' => $scraper->getTitle(),
            'link' => $scraper->getAddress(),
            'id' => $scraper->getId(),
            'views_count' => $scraper->getViewsCount(),
            'ok_count' => $scraper->getOkCount(),
            'comments_count' => $scraper->getCommentsCount(),
            'tags' => $scraper->getTags(),
            'content' => $scraper->getContent(),
            'time' => $scraper->getAddingTime(),
            'not_ok_count' => $scraper->getNotOkCount(),
            'comments' => $scraper->getComments(),
            'likers' => $scraper->getLikers(),
            'age_restrictions' => $scraper->getAgeRestrictions()
        ]);
    }
}