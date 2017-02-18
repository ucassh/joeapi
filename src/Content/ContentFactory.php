<?php

namespace Joe\Content;

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
            ->setViewsCount(isset($params['views_count']) ? $params['views_count'] : null);
    }
}