<?php

namespace Joe;

class ClubEntity
{
    /** @var int */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $type;
    /** @var User */
    private $founder;
    /** @var \DateTime */
    private $created;
    /** @var \DateTime */
    private $lastActivity;
    /** @var int */
    private $postsQuantity;
    /** @var int */
    private $membersQuantity;
    /** @var int */
    private $watched;
    /** @var string */
    private $thumbnail;
    /** @var string */
    private $description;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     */
    public function setName($name)
    {
        $this->name = $name;
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
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return User
     */
    public function getFounder()
    {
        return $this->founder;
    }

    /**
     * @param User $founder
     */
    public function setFounder($founder)
    {
        $this->founder = $founder;
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
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return \DateTime
     */
    public function getLastActivity()
    {
        return $this->lastActivity;
    }

    /**
     * @param \DateTime $lastActivity
     */
    public function setLastActivity($lastActivity)
    {
        $this->lastActivity = $lastActivity;
    }

    /**
     * @return int
     */
    public function getPostsQuantity()
    {
        return $this->postsQuantity;
    }

    /**
     * @param int $postsQuantity
     */
    public function setPostsQuantity($postsQuantity)
    {
        $this->postsQuantity = $postsQuantity;
    }

    /**
     * @return int
     */
    public function getMembersQuantity()
    {
        return $this->membersQuantity;
    }

    /**
     * @param int $membersQuantity
     */
    public function setMembersQuantity($membersQuantity)
    {
        $this->membersQuantity = $membersQuantity;
    }

    /**
     * @return int
     */
    public function getWatched()
    {
        return $this->watched;
    }

    /**
     * @param int $watched
     */
    public function setWatched($watched)
    {
        $this->watched = $watched;
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
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}
