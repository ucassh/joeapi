<?php

namespace Tests;

use Joe\Content\ArtSnippet;
use Joe\User\SendedContent;

class SendedContentTest extends TestsAbstract
{

    public function testArtPagesQuantity()
    {
        $response = $this->mockResponse(file_get_contents('tests/files/articles_list.html'));
        $client = $this->mockClient($response);
        $user = $this->mockUser($client);

        $sended = new SendedContent($user);
        $this->assertEquals(576, $sended->artPagesQuantity());
    }

    public function testFilmPagesQuantity()
    {
        $response = $this->mockResponse(file_get_contents('tests/files/films_list.html'));
        $client = $this->mockClient($response);
        $user = $this->mockUser($client);

        $sended = new SendedContent($user);
        $this->assertEquals(302, $sended->filmPagesQuantity());
    }

    public function testGetArticlesPageCount()
    {
        $response = $this->mockResponse(file_get_contents('tests/files/articles_list.html'));
        $client = $this->mockClient($response);
        $user = $this->mockUser($client);

        $sended = new SendedContent($user);
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

    public function testArtPagesQuantityButBoPagesInListing()
    {
        $response = $this->mockResponse(file_get_contents('tests/files/empty_articles_list.html'));
        $client = $this->mockClient($response);
        $user = $this->mockUser($client);

        $sended = new SendedContent($user);
        $this->assertEquals(0, $sended->artPagesQuantity());
    }

    public function testGetArticlesPageCountButBothingFound()
    {
        $response = $this->mockResponse(file_get_contents('tests/files/empty_articles_list.html'));
        $client = $this->mockClient($response);
        $user = $this->mockUser($client);

        $sended = new SendedContent($user);
        $articles = $sended->getArticlesPage();
        $this->assertEquals(0, $articles->count());
    }
}
