<?php

namespace Joe\Content;

abstract class ContentFactory
{
    protected $clazz;
    /**
     * @param array $params
     * @return Content
     */
    public function createFromListing(array $params = [])
    {
        $cls = 'Joe\Content\\'.$this->clazz;
        $art = new $cls($params['id']);
        return $art->setAddingTimeFromSnippet($params['time'])
            ->setAddingDateFromSnippet($params['date'])
            ->setAuthor($params['author'])
            ->setLink($params['link'])
            ->setOkCountFromSnippet($params['ok_count'])
            ->setCommentsCountFromSnippet($params['comments_count'])
            ->setSnippetMsg($params['snippet_msg'])
            ->setThumbnail($params['thumbnail'])
            ->setTitle($params['title'])
            ->setViewsFromSnippet($params['views_count']);
    }
}