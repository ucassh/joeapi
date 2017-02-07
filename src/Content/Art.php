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
    private $addingTimeOnPage;
    private $okCountFromSnippet;
    private $okCountOnPage;
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
     */
    public function setAuthor($author)
    {
        $this->author = $author;
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
     */
    public function setLink($link)
    {
        $this->link = $link;
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
     */
    public function setId($id)
    {
        $this->id = $id;
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
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
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
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     */
    public function setSnippetMsg($snippetMsg)
    {
        $this->snippetMsg = $snippetMsg;
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
     */
    public function setViewsFromSnippet($viewsFromSnippet)
    {
        $this->viewsFromSnippet = $viewsFromSnippet;
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
     */
    public function setViewsOnPage($viewsOnPage)
    {
        $this->viewsOnPage = $viewsOnPage;
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
     */
    public function setAddingTimeFromSnippet($addingTimeFromSnippet)
    {
        $this->addingTimeFromSnippet = $addingTimeFromSnippet;
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
     */
    public function setAddingTimeOnPage($addingTimeOnPage)
    {
        $this->addingTimeOnPage = $addingTimeOnPage;
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
     */
    public function setOkCountFromSnippet($okCountFromSnippet)
    {
        $this->okCountFromSnippet = $okCountFromSnippet;
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
     */
    public function setOkCountOnPage($okCountOnPage)
    {
        $this->okCountOnPage = $okCountOnPage;
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
     */
    public function setArtContent($artContent)
    {
        $this->artContent = $artContent;
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
     */
    public function setFullDescription($fullDescription)
    {
        $this->fullDescription = $fullDescription;
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
     */
    public function setNotOkCount($notOkCount)
    {
        $this->notOkCount = $notOkCount;
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
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }
}