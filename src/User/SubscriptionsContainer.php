<?php

namespace Joe\User;

class SubscriptionsContainer
{
    /** @var \ArrayObject */
    private $blogSubscriptions;
    /** @var \ArrayObject */
    private $wardrobeSubscriptions;
    /** @var \ArrayObject */
    private $subscribedBlogs;
    /** @var \ArrayObject */
    private $subscribedWardrobes;

    /**
     * @return \ArrayObject
     */
    public function getBlogSubscriptions()
    {
        return $this->blogSubscriptions;
    }

    /**
     * @param \ArrayObject $blogSubscriptions
     * @return $this
     */
    public function setBlogSubscriptions(\ArrayObject $blogSubscriptions)
    {
        $this->blogSubscriptions = $blogSubscriptions;
        return $this;
    }

    /**
     * @return \ArrayObject
     */
    public function getWardrobeSubscriptions()
    {
        return $this->wardrobeSubscriptions;
    }

    /**
     * @param \ArrayObject $wardrobeSubscriptions
     * @return $this
     */
    public function setWardrobeSubscriptions(\ArrayObject $wardrobeSubscriptions)
    {
        $this->wardrobeSubscriptions = $wardrobeSubscriptions;
        return $this;
    }

    /**
     * @return \ArrayObject
     */
    public function getSubscribedBlogs()
    {
        return $this->subscribedBlogs;
    }

    /**
     * @param \ArrayObject $subscribedBlogs
     * @return $this
     */
    public function setSubscribedBlogs(\ArrayObject $subscribedBlogs)
    {
        $this->subscribedBlogs = $subscribedBlogs;
        return $this;
    }

    /**
     * @return \ArrayObject
     */
    public function getSubscribedWardrobes()
    {
        return $this->subscribedWardrobes;
    }

    /**
     * @param \ArrayObject $subscribedWardrobes
     * @return $this
     */
    public function setSubscribedWardrobes(\ArrayObject $subscribedWardrobes)
    {
        $this->subscribedWardrobes = $subscribedWardrobes;
        return $this;
    }

}
