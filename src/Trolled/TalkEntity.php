<?php

namespace Joe\Trolled;

use Joe\User;

class TalkEntity
{
    /** @var User */
    private $author;

    /** @var \DateTime */
    private $created;

    /** @var string */
    private $content;

    /**
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param User $author
     * @return TalkEntity
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
     * @return TalkEntity
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return TalkEntity
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}
