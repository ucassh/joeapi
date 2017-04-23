<?php

namespace Joe\Club\Forum;

use Joe\User;

class ClubForumPostEntity
{
    /** @var User */
    private $author;
    /** @var \DateTime */
    private $created;
    /** @var [] */
    private $properties;
    /** @var string */
    private $message;
    /** @var [] */
    private $edits;

    /**
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param User $author
     * @return ClubForumPostEntity
     */
    public function setAuthor($author)
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
     * @return ClubForumPostEntity
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param mixed $properties
     * @return ClubForumPostEntity
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return ClubForumPostEntity
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEdits()
    {
        return $this->edits;
    }

    /**
     * @param mixed $edits
     * @return ClubForumPostEntity
     */
    public function setEdits($edits)
    {
        $this->edits = $edits;
        return $this;
    }


}
