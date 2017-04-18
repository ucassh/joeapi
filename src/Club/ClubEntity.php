<?php

namespace Joe\Club;

use Joe\Club\Forum\ClubForumThreadEntity;
use Joe\Http\Scraper\ScrapPagesInterface;
use Joe\User;

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

    /** @var ScrapPagesInterface */
    private $membersScraper;
    /** @var ScrapPagesInterface */
    private $forumScraper;
    /** @var ScrapPagesInterface */
    private $imagesScraper;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
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
     * @return $this
     */
    public function setFounder(User $founder)
    {
        $this->founder = $founder;
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
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
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
     * @return $this
     */
    public function setLastActivity(\DateTime $lastActivity)
    {
        $this->lastActivity = $lastActivity;
        return $this;
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
     * @return $this
     */
    public function setPostsQuantity($postsQuantity)
    {
        $this->postsQuantity = $postsQuantity;
        return $this;
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
     * @return $this
     */
    public function setMembersQuantity($membersQuantity)
    {
        $this->membersQuantity = $membersQuantity;
        return $this;
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
     * @return $this
     */
    public function setWatched($watched)
    {
        $this->watched = $watched;
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
     * @return $this
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
        return $this;
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
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param int $page
     * @return User[]
     */
    public function getMembers($page = 1)
    {
        $this->membersScraper->scrapPage($page);
    }

    /**
     * @param int $page
     * @return []
     */
    public function getImages($page = 1)
    {
        $this->imagesScraper->scrapPage($page);
    }

    /**
     * @param int $page
     * @return ClubForumThreadEntity[]
     */
    public function getForumThreads($page = 1)
    {
        $this->forumScraper->scrapPage($page);
    }

    /**
     * @param ScrapPagesInterface $membersScraper
     * @return $this
     */
    public function setMembersScraper(ScrapPagesInterface $membersScraper)
    {
        $this->membersScraper = $membersScraper;
        return $this;
    }

    /**
     * @param ScrapPagesInterface $forumScraper
     * @return $this
     */
    public function setForumScraper(ScrapPagesInterface $forumScraper)
    {
        $this->forumScraper = $forumScraper;
        return $this;
    }

    /**
     * @param ScrapPagesInterface $imagesScraper
     * @return $this
     */
    public function setImagesScraper(ScrapPagesInterface $imagesScraper)
    {
        $this->imagesScraper = $imagesScraper;
        return $this;
    }
}
