<?php

use Joe\Helper\TimeHelper;

class TimeHelperTest extends PHPUnit_Framework_TestCase
{

    public function testMonthNamtToNumber()
    {
        $this::assertSame('01', TimeHelper::monthNameToNumber('stycznia'));
        $this::assertSame('02', TimeHelper::monthNameToNumber('lutego'));
        $this::assertSame('03', TimeHelper::monthNameToNumber('marca'));
        $this::assertSame('04', TimeHelper::monthNameToNumber('kwietnia'));
        $this::assertSame('05', TimeHelper::monthNameToNumber('maja'));
        $this::assertSame('06', TimeHelper::monthNameToNumber('czerwca'));
        $this::assertSame('07', TimeHelper::monthNameToNumber('lipca'));
        $this::assertSame('08', TimeHelper::monthNameToNumber('sierpnia'));
        $this::assertSame('09', TimeHelper::monthNameToNumber('września'));
        $this::assertSame('10', TimeHelper::monthNameToNumber('października'));
        $this::assertSame('11', TimeHelper::monthNameToNumber('listopada'));
        $this::assertSame('12', TimeHelper::monthNameToNumber('grudnia'));
        $this::assertSame('01', TimeHelper::monthNameToNumber('default'));
    }
}
