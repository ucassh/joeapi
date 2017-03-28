<?php

namespace Tests;

use Joe\Content\Factory\FilmFactory;

class ChildFilmFactory extends FilmFactory{
    /**
     * @return mixed
     */
    public function getClazz()
    {
        return $this->getClass();
    }
}

class FilmFactoryTest extends TestsAbstract
{
    public function testCreateFIlmFactory()
    {
        $child = new ChildFilmFactory();
        $this::assertSame('Joe\Content\Film', $child->getClazz());
    }
}
