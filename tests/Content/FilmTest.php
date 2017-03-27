<?php

namespace Tests;

use Joe\Content\Film;

class FilmTest extends TestsAbstract
{
    public function testCreateFilm()
    {
        $film = new Film(1);
        $this::assertSame(Film::class, get_class($film));
        return $film;
    }

    /**
     * @depends testCreateFilm
     */
    public function testFilmGetAndSet(Film $film)
    {
        $film->setCategory($value = '123');
        self::assertSame($value, $film->getCategory());
    }
}
