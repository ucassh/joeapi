<?php

namespace Joe\Archieve;

//TODO migrate this into ArtSnippet (but first HARD refactor of ArtSnippet)
class ArchiveEntryEntity
{
    /** @var \DateTime */
    private $date;
    /** @var string */
    private $url;
    /** @var string */
    private $name;
    /** @var int */
    private $okCount;
    /** @var int */
    private $viewsCount;
    /** @var int */
    private $commentsCount;

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return ArchiveEntryEntity
     */
    public function setDate($date)
    {
        $this->date = $date;
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
     * @return ArchiveEntryEntity
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ArchiveEntryEntity
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getOkCount()
    {
        return $this->okCount;
    }

    /**
     * @param int $okCount
     * @return ArchiveEntryEntity
     */
    public function setOkCount($okCount)
    {
        $this->okCount = $okCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getViewsCount()
    {
        return $this->viewsCount;
    }

    /**
     * @param int $viewsCount
     * @return ArchiveEntryEntity
     */
    public function setViewsCount($viewsCount)
    {
        $this->viewsCount = $viewsCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getCommentsCount()
    {
        return $this->commentsCount;
    }

    /**
     * @param int $commentsCount
     * @return ArchiveEntryEntity
     */
    public function setCommentsCount($commentsCount)
    {
        $this->commentsCount = $commentsCount;
        return $this;
    }



}
