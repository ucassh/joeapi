<?php

namespace Joe\Content;

class ArtFactory extends ContentFactory
{
    public function __construct()
    {
        $this->clazz = 'Art';
    }

    public function create(array $params = [])
    {
        return parent::create($params)
            ->setTags(isset($params['tags']) ? $params['tags'] : null)
            ->setViewsCount(isset($params['main_views_count']) ? $params['main_views_count'] : null)
            ->setContent(isset($params['full_description']) ? $params['full_description'] : null)
            ->setOkCount(isset($params['main_ok_count']) ? $params['main_ok_count'] : null)
            ->setNotOkCount(isset($params['main_not_ok_count']) ? $params['main_not_ok_count'] : null);
    }

}
