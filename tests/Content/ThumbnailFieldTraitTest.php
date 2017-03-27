<?php

namespace Tests;

use Joe\Content\ThumbnailFieldTrait;

class ThumbnailFieldTraitTest extends TestsAbstract
{
    /** @var ThumbnailFieldTrait */
    private $instance;

    public function setUp()
    {
        $this->instance = $this->getMockForTrait(ThumbnailFieldTrait::class);
    }

    public function testThumbnailFieldTraitTest()
    {
        $this->instance->setThumbnail($value = '123');
        self::assertSame($value, $this->instance->GetThumbnail());
    }
}
