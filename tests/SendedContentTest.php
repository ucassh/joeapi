<?php

namespace Tests;

use Joe\Content\Art;
use Joe\Content\ArtSnippet;
use Joe\Content\Film;
use Joe\Content\FilmSnippet;
use Joe\User\SendedContent;

class SendedContentTest extends TestsAbstract
{

    public function testArtPagesQuantity()
    {
        $sended = $this->getSendedContentInstance(file_get_contents('tests/files/articles_list.html'));
        $this->assertEquals(576, $sended->artPagesQuantity());
    }

    public function testFilmPagesQuantity()
    {
        $sended = $this->getSendedContentInstance(file_get_contents('tests/files/films_list.html'));
        $this->assertEquals(302, $sended->filmPagesQuantity());
    }

    public function testGetArticlesPage()
    {
        $sended = $this->getSendedContentInstance(file_get_contents('tests/files/articles_list.html'));

        $articles = $sended->getArticlesPage();
        $this->assertEquals(10, $articles->count());
        /** @var ArtSnippet[] $artArr */
        $artArr = $articles->getArrayCopy();
        //$this->assertEquals('profil', $artArr[0]->getAuthor()->nickName()); // not gonna test this, cause nickname cames from mockobject, and it's not same as in mockfile
        $this->assertEquals(new \DateTime('2017-02-09'), $artArr[0]->getAddingTime());
        $this->assertEquals(77, $artArr[0]->getCommentsCount());
        $this->assertEquals(38744, $artArr[0]->getId());
        $this->assertEquals(199, $artArr[0]->getOkCount());
        $this->assertEquals('Zrzucenie kilku, kilkunastu zbędnych kilogramów to szlachetne przedsięwzięcie. Problem pojawia się, gdy odchudzanie staje się obsesją. Te kobiety przeżyły piekło anoreksji i dziś stanowią przykład dla...', $artArr[0]->getContent());
        $this->assertEquals('http://img.joemonster.org/i/thumbs/artpic38744-440.jpg', $artArr[0]->getThumbnail());
        $this->assertEquals('8 kobiet, które są wdzięczne za każdy kilogram swojego ciała', $artArr[0]->getTitle());
        $this->assertEquals(102755, $artArr[0]->getViewsCount());
        $this->assertEquals('/art/38744/8_kobiet_ktore_sa_wdzieczne_za_kazdy_kilogram_swojego_ciala', $artArr[0]->getLink());
    }

    public function testGetFilmsPage()
    {
        $sended = $this->getSendedContentInstance(file_get_contents('tests/files/films_list.html'));

        $articles = $sended->getFilmsPage();
        $this->assertEquals(10, $articles->count());
        /** @var FilmSnippet[] $filmArr */
        $filmArr = $articles->getArrayCopy();
        //$this->assertEquals('profil', $filmArr[0]->getAuthor()->nickName()); // not gonna test this, cause nickname cames from mockobject, and it's not same as in mockfile
        $this->assertEquals(new \DateTime('2017-03-04'), $filmArr[0]->getAddingTime());
        $this->assertEquals(36, $filmArr[0]->getCommentsCount());
        $this->assertEquals(82233, $filmArr[0]->getId());
        $this->assertEquals(65, $filmArr[0]->getOkCount());
        $this->assertEquals('Podczas testów w Katalonii widzowie mogli poczuć już zbliżający się przyszły sezon. Kolejne zmiany - czy na lepsze? Sami oceńcie.', $filmArr[0]->getContent());
        $this->assertEquals('http://download.joemonster.org/th/p346934.jpg', $filmArr[0]->getThumbnail());
        $this->assertEquals('F1 w 2017 roku - wyjazd bolidów z pitstopu, nowy wygląd, start i dźwięk', $filmArr[0]->getTitle());
        $this->assertEquals(17400, $filmArr[0]->getViewsCount());
        $this->assertEquals('/filmy/82233/F1_w_2017_roku_wyjazd_bolidow_z_pitstopu_nowy_wyglad_start_i_dzwiek_', $filmArr[0]->getLink());
    }

    public function testArtPagesQuantityButBoPagesInListing()
    {
        $sended = $this->getSendedContentInstance(file_get_contents('tests/files/empty_articles_list.html'));
        $this->assertEquals(0, $sended->artPagesQuantity());
    }

    public function testGetArticlesPageCountButBothingFound()
    {
        $sended = $this->getSendedContentInstance(file_get_contents('tests/files/empty_articles_list.html'));
        $articles = $sended->getArticlesPage();
        $this->assertEquals(0, $articles->count());
    }

    public function testGetImagesPageCount()
    {
        $sended = $this->getSendedContentInstance(file_get_contents('tests/files/images-quantity-3-pages.html'));
        $this->assertEquals(3, $sended->imagesPagesQuantity());
    }

    /**
     * @return SendedContent
     */
    private function getSendedContentInstance($htmlContent)
    {
        $response = $this->mockResponse($htmlContent);
        $client = $this->mockClient($response);
        $user = $this->mockUser($client);

        $sended = new SendedContent($user);
        return $sended;
    }

    public function testGetArt()
    {
        $sended = $this->getSendedContentInstance(file_get_contents('tests/files/art.html'));
        $this::assertEquals(Art::class, get_class($sended->getArt(123)));
    }

    public function testGetFilm()
    {
        $sended = $this->getSendedContentInstance(file_get_contents('tests/files/film.html'));
        $this::assertEquals(Film::class, get_class($sended->getFilm(123)));
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Content not found
     */
    public function testNoContent()
    {
        $sended = $this->getSendedContentInstance('<body></body>');
        $sended->getFilm(123);
    }
}
