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
        return $this->createFromListing($params[''])
            ->getTags($params[''])
            ->getViewsOnPage($params[''])
            ->getFullDescription($params[''])
            ->getAddingTimeOnPage($params[''])
            ->getOkCountOnPage($params[''])
            ->getNotOkCount($params['']);
    }

}
