<?php

namespace Joe;

class Fan extends User
{
    /** @var \DateTime */
    private $since;

    /** @var User */
    private $whom;

    /**
     * @param $id
     * @param User $user
     * @param \DateTime $since
     */
    public function __construct($id, User $user, \DateTime $since = null)
    {
        $this->whom = $user;
        $this->since = $since;

        parent::__construct($id);
    }

    /**
     * @return \DateTime
     */
    public function since()
    {
        return $this->since;
    }

    /**
     * @return User
     */
    public function whom()
    {
        return $this->whom;
    }
}