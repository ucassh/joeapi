<?php

namespace Joe;

class Comment
{
    /** @var $message string*/
    private $message;

    /**@var $date \DateTime*/
    private $date;

    /** @var $favcount int*/
    private $favcount;

    /** @var $notOkCount int*/
    private $notOkCount;

    /**@var $toplevel int*/
    private $toplevel;

    /** @var $contentId int*/
    private $contentId;

    /**@var $parentId int*/
    private $parentId;

    /** @var $unixTimestamp int*/
    private $unixTimestamp;

    /** @var $type string*/
    private $type;

    /** @var $elementId string*/
    private $elementId;

    /** @var $link string*/
    private $link;

    /** @var $user User */
    private $user;

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Comment
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return Comment
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getFavcount()
    {
        return $this->favcount;
    }

    /**
     * @param int $favcount
     * @return Comment
     */
    public function setFavcount($favcount)
    {
        $this->favcount = $favcount;
        return $this;
    }

    /**
     * @return int
     */
    public function getToplevel()
    {
        return $this->toplevel;
    }

    /**
     * @param int $toplevel
     * @return Comment
     */
    public function setToplevel($toplevel)
    {
        $this->toplevel = $toplevel;
        return $this;
    }

    /**
     * @return int
     */
    public function getContentId()
    {
        return $this->contentId;
    }

    /**
     * @param int $contentId
     * @return Comment
     */
    public function setContentId($contentId)
    {
        $this->contentId = $contentId;
        return $this;
    }

    /**
     * @return int
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param int $parentId
     * @return Comment
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * @return int
     */
    public function getUnixTimestamp()
    {
        return $this->unixTimestamp;
    }

    /**
     * @param int $unixTimestamp
     * @return Comment
     */
    public function setUnixTimestamp($unixTimestamp)
    {
        $this->unixTimestamp = $unixTimestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Comment
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getElementId()
    {
        return $this->elementId;
    }

    /**
     * @param string $elementId
     * @return Comment
     */
    public function setElementId($elementId)
    {
        $this->elementId = $elementId;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     * @return Comment
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Comment
     */
    public function setUser($user)
    {
        $this->user = $user;
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
     * @return Comment
     */
    public function setNotOkCount($notOkCount)
    {
        $this->notOkCount = $notOkCount;
        return $this;
    }


}