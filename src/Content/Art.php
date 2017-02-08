<?php

namespace Joe\Content;


class Art
{
    private $author;
    private $link;
    private $id;
    private $thumbnail;
    private $title;
    private $snippetMsg;
    private $viewsFromSnippet;
    private $viewsOnPage;
    private $addingTimeFromSnippet;
    private $addingDateFromSnippet;
    private $addingTimeOnPage;
    private $okCountFromSnippet;
    private $okCountOnPage;
    private $commentsCountFromSnippet;
    private $artContent;
    private $fullDescription;
    private $notOkCount;
    private $tags;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     * @return Art
     */
    public function setAuthor($author)
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
     * @return Art
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
     * @param mixed $id
     * @return Art
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param mixed $thumbnail
     * @return Art
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
        return $this;
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
     * @return Art
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnippetMsg()
    {
        return $this->snippetMsg;
    }

    /**
     * @param mixed $snippetMsg
     * @return Art
     */
    public function setSnippetMsg($snippetMsg)
    {
        $this->snippetMsg = $snippetMsg;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getViewsFromSnippet()
    {
        return $this->viewsFromSnippet;
    }

    /**
     * @param mixed $viewsFromSnippet
     * @return Art
     */
    public function setViewsFromSnippet($viewsFromSnippet)
    {
        $this->viewsFromSnippet = $viewsFromSnippet;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getViewsOnPage()
    {
        return $this->viewsOnPage;
    }

    /**
     * @param mixed $viewsOnPage
     * @return Art
     */
    public function setViewsOnPage($viewsOnPage)
    {
        $this->viewsOnPage = $viewsOnPage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddingTimeFromSnippet()
    {
        return $this->addingTimeFromSnippet;
    }

    /**
     * @param mixed $addingTimeFromSnippet
     * @return Art
     */
    public function setAddingTimeFromSnippet($addingTimeFromSnippet)
    {
        $this->addingTimeFromSnippet = $addingTimeFromSnippet;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddingTimeOnPage()
    {
        return $this->addingTimeOnPage;
    }

    /**
     * @param mixed $addingTimeOnPage
     * @return Art
     */
    public function setAddingTimeOnPage($addingTimeOnPage)
    {
        $this->addingTimeOnPage = $addingTimeOnPage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOkCountFromSnippet()
    {
        return $this->okCountFromSnippet;
    }

    /**
     * @param mixed $okCountFromSnippet
     * @return Art
     */
    public function setOkCountFromSnippet($okCountFromSnippet)
    {
        $this->okCountFromSnippet = $okCountFromSnippet;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOkCountOnPage()
    {
        return $this->okCountOnPage;
    }

    /**
     * @param mixed $okCountOnPage
     * @return Art
     */
    public function setOkCountOnPage($okCountOnPage)
    {
        $this->okCountOnPage = $okCountOnPage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getArtContent()
    {
        return $this->artContent;
    }

    /**
     * @param mixed $artContent
     * @return Art
     */
    public function setArtContent($artContent)
    {
        $this->artContent = $artContent;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFullDescription()
    {
        return $this->fullDescription;
    }

    /**
     * @param mixed $fullDescription
     * @return Art
     */
    public function setFullDescription($fullDescription)
    {
        $this->fullDescription = $fullDescription;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNotOkCount()
    {
        return $this->notOkCount;
    }

    /**
     * @param mixed $notOkCount
     * @return Art
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
     * @return Art
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getAddingDateFromSnippet()
    {
        return $this->addingDateFromSnippet;
    }

    /**
     * @param \DateTime $addingDateFromSnippet
     * @return Art
     */
    public function setAddingDateFromSnippet(\DateTime $addingDateFromSnippet)
    {
        $this->addingDateFromSnippet = $addingDateFromSnippet;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommentsCountFromSnippet()
    {
        return $this->commentsCountFromSnippet;
    }

    /**
     * @param mixed $commentsCountFromSnippet
     * @return Art
     */
    public function setCommentsCountFromSnippet($commentsCountFromSnippet)
    {
        $this->commentsCountFromSnippet = $commentsCountFromSnippet;
        return $this;
    }

}
