<?php

namespace Joe\Club\Forum;

use Joe\User;

class ClubForumThreadEntity
{
    /** @var string  */
    private $title;
    /** @var string  */
    private $snippet;
    /** @var User */
    private $author;
    /** @var \DateTime */
    private $created;
    /** @var User */
    private $latestCommentedBy;
    /** @var \DateTime */
    private $lastCommented;
    /** @var string */
    private $url;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return ClubForumThreadEntity
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * @param mixed $snippet
     * @return ClubForumThreadEntity
     */
    public function setSnippet($snippet)
    {
        $this->snippet = $snippet;
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
     * @return ClubForumThreadEntity
     */
    public function setAuthor(User $author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     * @return ClubForumThreadEntity
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return User
     */
    public function getLatestCommentedBy()
    {
        return $this->latestCommentedBy;
    }

    /**
     * @param User $latestCommentedBy
     * @return ClubForumThreadEntity
     */
    public function setLatestCommentedBy($latestCommentedBy)
    {
        $this->latestCommentedBy = $latestCommentedBy;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastCommented()
    {
        return $this->lastCommented;
    }

    /**
     * @param \DateTime $lastCommented
     * @return ClubForumThreadEntity
     */
    public function setLastCommented(\DateTime $lastCommented)
    {
        $this->lastCommented = $lastCommented;
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
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }
}
