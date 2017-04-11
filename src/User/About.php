<?php

namespace Joe\User;

use Joe\User;

class About
{
    /** @var User */
    private $user;

    private $properties;
    private $helloMessage;
    private $basicInfo;
    private $categorisedInfo;
    private $localization;
    private $id;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return array
     */
    protected function getProperties()
    {
        return $this->properties;
    }

    /**
     * @return mixed
     */
    public function getHelloMessage()
    {
        return $this->helloMessage;
    }

    /**
     * @return array
     */
    public function getBasicInfo()
    {
        return $this->basicInfo;
    }

    /**
     * @return mixed
     */
    public function getCategorisedInfo()
    {
        return $this->categorisedInfo;
    }

    /**
     * @return mixed
     */
    public function getLocalization()
    {
        return $this->localization;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @param mixed $properties
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
    }

    /**
     * @param mixed $helloMessage
     */
    public function setHelloMessage($helloMessage)
    {
        $this->helloMessage = $helloMessage;
    }

    /**
     * @param mixed $basicInfo
     */
    public function setBasicInfo($basicInfo)
    {
        $this->basicInfo = $basicInfo;
    }

    /**
     * @param mixed $categorisedInfo
     */
    public function setCategorisedInfo($categorisedInfo)
    {
        $this->categorisedInfo = $categorisedInfo;
    }

    /**
     * @param mixed $localization
     */
    public function setLocalization($localization)
    {
        $this->localization = $localization;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

}
