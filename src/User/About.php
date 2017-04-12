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
    private $localization;
    private $id;

    /**
     * @return array
     */
    public function getProperties()
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
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @param mixed $properties
     * @return $this
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
        return $this;
    }

    /**
     * @param mixed $helloMessage
     * @return $this
     */
    public function setHelloMessage($helloMessage)
    {
        $this->helloMessage = $helloMessage;
        return $this;
    }

    /**
     * @param mixed $basicInfo
     * @return $this
     */
    public function setBasicInfo($basicInfo)
    {
        $this->basicInfo = $basicInfo;
        return $this;
    }

    /**
     * @param mixed $localization
     * @return $this
     */
    public function setLocalization($localization)
    {
        $this->localization = $localization;
        return $this;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

}
