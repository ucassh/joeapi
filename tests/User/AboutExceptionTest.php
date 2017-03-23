<?php

namespace Tests;

use Tests\User\AboutAbstract;

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
