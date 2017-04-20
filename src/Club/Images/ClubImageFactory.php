<?php

namespace Joe\Club\Images;

use Joe\User;

class ClubImageFactory
{
    /**
     * @param array $params
     * @return ClubImageEntity
     */
    public function create(array $params = [])
    {
        return (new ClubImageEntity())
            ->setAuthor(new User($params['username'] ?:null))
            ->setImgSite($params['img_site'] ?:'')
            ->setImgUrl($params['img_url'] ?:'');
    }
}
