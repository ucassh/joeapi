<?php

namespace Joe\Content;

class Art extends Content
{
    private $artContent;

    /**
     * @return mixed
     */
    public function getArtContent()
    {
        return $this->artContent;
    }

    /**
     * @param mixed $artContent
     * @return Art
     */
    public function setArtContent($artContent)
    {
        $this->artContent = $artContent;
        return $this;
    }
}
