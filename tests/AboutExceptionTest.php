<?php

namespace Tests;

class AboutExceptionTest extends AboutAbstract
{
    /**
     * @expectedException \Exception
     */
    public function testException()
    {
        $this->about->getBasicInfo();
    }

    protected function getContent()
    {
        return file_get_contents('tests/files/taksobietestuje.noprofilleft.about.html');
    }
}
