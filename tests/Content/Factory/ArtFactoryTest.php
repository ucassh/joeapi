<?php

namespace Tests;

use Joe\Content\Factory\ArtFactory;

class ChildArtFactory extends ArtFactory{
    /**
     * @return mixed
     */
    public function getClazz()
    {
        return $this->clazz;
    }
}

class ArtFactoryTest extends TestsAbstract
{

    public function testCreateArtFactory()
    {
        $child = new ChildArtFactory();
        $this::assertSame('Art', $child->getClazz());
    }
}
