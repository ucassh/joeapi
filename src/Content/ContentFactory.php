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
        /** @var Content $content */
        $content = new $cls(isset($params['id']) ? $params['id'] : null);
        return $content->setAddingTimeFromSnippet(isset($params['time']) ? $params['time'] : null)
            ->setAddingDateFromSnippet(isset($params['date']) ? $params['date'] : null)
            ->setAuthor(isset($params['author']) ? $params['author'] : null)
            ->setLink(isset($params['link']) ? $params['link'] : null)
            ->setOkCountFromSnippet(isset($params['ok_count']) ? $params['ok_count'] : null)
            ->setCommentsCountFromSnippet(isset($params['comments_count']) ? $params['comments_count'] : null)
            ->setSnippetMsg(isset($params['snippet_msg']) ? $params['snippet_msg'] : null)
            ->setThumbnail(isset($params['thumbnail']) ? $params['thumbnail'] : null)
            ->setTitle(isset($params['title']) ? $params['title'] : null)
            ->setViewsFromSnippet(isset($params['views_count']) ? $params['views_count'] : null);
    }
}