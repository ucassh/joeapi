<?php

namespace Tests;

use Joe\Content\Factory\ArtFactory;

class ChildArtFactory extends ArtFactory{
    /**
     * @return mixed
     */
    public function getClazz()
    {
        return $this->getClass();
    }
}

class ArtFactoryTest extends TestsAbstract
{

    public function testCreateArtFactory()
    {
        $child = new ChildArtFactory();
        $this::assertSame('Joe\Content\Art', $child->getClazz());
    }
}
