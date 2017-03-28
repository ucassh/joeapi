<?php

namespace Tests;

use Joe\Content\Factory\FilmFactory;

class ChildFilmFactory extends FilmFactory{
    /**
     * @return mixed
     */
    public function getClazz()
    {
        return $this->clazz;
    }
}

class FilmFactoryTest extends TestsAbstract
{
    public function testCreateArtFactory()
    {
        $child = new ChildFilmFactory();
        $this::assertSame('Film', $child->getClazz());
    }
}
