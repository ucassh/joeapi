<?php

namespace Joe\Club\Images;

use Joe\User;

class ClubImageEntity
{

    /** @var string */
    private $imgUrl;
    /** @var string */
    private $imgSite;
    /** @var User */
    private $author;

    /**
     * @return string
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    /**
     * @param string $imgUrl
     * @return ClubImageEntity
     */
    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getImgSite()
    {
        return $this->imgSite;
    }

    /**
     * @param string $imgSite
     * @return ClubImageEntity
     */
    public function setImgSite($imgSite)
    {
        $this->imgSite = $imgSite;
        return $this;
    }

    /**
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param User $author
     * @return ClubImageEntity
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }
}
