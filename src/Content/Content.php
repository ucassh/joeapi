<?php

namespace Joe\Content;

use Joe\User;

abstract class Content
{
    /** @var User $author */
    private $author;
    private $link;

    /** @var int $id */
    private $id;
    private $title;

    /** @var int $viewsCount */
    private $viewsCount;
    private $addingTime;

    /** @var int $okCount */
    private $okCount;

    /** @var int $commentsCount */
    private $commentsCount;

    private $content;

    /** @var int $notOkCount */
    private $notOkCount;
    private $tags;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed User $author
     * @return Content
     */
    public function setAuthor(User $author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     * @return Content
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Content
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * @return Content
     */
    public function setViewsCount($viewsCount)
    {
        $this->viewsCount = $viewsCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddingTime()
    {
        return $this->addingTime;
    }

    public function setAddingTime(\DateTime $addingTime = null)
    {
        $this->addingTime = $addingTime;
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
     * @return Content
     */
    public function setOkCount($okCount)
    {
        $this->okCount = $okCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return Content
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int
     */
    public function getNotOkCount()
    {
        return $this->notOkCount;
    }

    /**
     * @param int $notOkCount
     * @return Content
     */
    public function setNotOkCount($notOkCount)
    {
        $this->notOkCount = $notOkCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     * @return Content
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
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
     * @return Content
     */
    public function setCommentsCount($commentsCount)
    {
        $this->commentsCount = $commentsCount;
        return $this;
    }
}
