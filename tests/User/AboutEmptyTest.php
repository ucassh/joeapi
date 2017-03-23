<?php

namespace Tests;

use Tests\User\AboutAbstract;

class AboutEmptyTest extends AboutAbstract
{
    protected function tearDown()
    {
        $this->about = null;
    }

    public function testEmptyBasicInfo()
    {
        $basicInfo = $this->about->getBasicInfo();
        $this::assertEmpty($basicInfo);
    }

    public function testEmptyLocalization()
    {
        $localization = $this->about->getLocalization();
        $this::assertEmpty($localization);
    }

    protected function getContent()
    {
        return file_get_contents('tests/files/taksobietestuje.less.about.html');
    }
}
