<?php

namespace Joe\Top;

class TopEntryEntity
{
    /** @var string */
    private $title;
    /** @var string */
    private $url;
    /** @var string */
    private $thumbnail;
    /** @var int */
    private $views;
    /** @var int */
    private $type;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return TopEntryEntity
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return TopEntryEntity
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param string $thumbnail
     * @return TopEntryEntity
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @return int
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param int $views
     * @return TopEntryEntity
     */
    public function setViews($views)
    {
        $this->views = $views;
        return $this;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return TopEntryEntity
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }


}
