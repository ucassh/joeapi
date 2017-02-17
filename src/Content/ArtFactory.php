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
        return $this->createFromListing($params)
            ->setTags(isset($params['tags']) ? $params['tags'] : null)
            ->setViewsOnPage(isset($params['main_views_count']) ? $params['main_views_count'] : null)
            ->setFullDescription(isset($params['full_description']) ? $params['full_description'] : null)
            ->setAddingTimeOnPage(isset($params['main_adding_time']) ? $params['main_adding_time'] : null)
            ->setOkCountOnPage(isset($params['main_ok_count']) ? $params['main_ok_count'] : null)
            ->setNotOkCount(isset($params['main_not_ok_count']) ? $params['main_not_ok_count'] : null);
    }

}
